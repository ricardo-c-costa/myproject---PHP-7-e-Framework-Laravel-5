<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Artigos;
use Goutte\Client;
use Auth;
use Session;
use Hash;

class DashboardController extends Controller
{

	public function Autenticar(Request $request)
	{
		$fields = $request->validate
		([
			'user' => 'required|min:4',
			'password' => 'required|alphaNum|min:4'
		]);

		$user_data = array(
			'user' => $request->get('user'),
			'password' => $request->get('password')
		);

		// dd(Auth::attempt($user_data));

		if (Auth::attempt($user_data)) 
		{
			return redirect('capturar');
		}
		else 
		{
			return back()->with('error', 'Usuario não cadastrado');
		}
	}
	public function AuthSuccess()
	{
		return view('logado.capturar');
	}
	public function logout() 
	{
		Auth::logout();
		return redirect('/');
	}
	public function postCapturar(Request $request) 
	{
		$fields = $request->validate
		([
			'busca' => 'required|between:3,50'
		]);

		// CONFIG REQUEST
		$busca = preg_replace('/[ -]+/' , '+' ,$request->busca);
		$url = 'https://www.uplexis.com.br/blog/';
		// Goutte
		$client = new Client();
		$crawler = $client->request('get', $url.'?s='.$busca);
		
		// GET TITULO  
		if ($elements = $crawler->filter('.title')->getNode(0) == NULL) 
		{
			// CASO NADA SEJA ENCONTRADO - REDIRECIONA E MOSTRA MENSAGEM DE ERRO
			Session::flash('error', 'Busca não encontrada');
			return redirect()->route('capturar.logado');
		}
		else 
		{
			$titulo = $crawler->filter('.title')->each(function($node){return $node->text();});
			
			// GET LINK
			$link = $crawler->selectLink('Continue Lendo')->link();
			$crawler = $client->click($link);
			$link = ($crawler->getUri());




			$data_artigos = array(
				'title' => $titulo[0],
				'link' => $link,
			);


			$insert = Artigos::create([
				'titulo' => $data_artigos['title'],
				'link'   => $data_artigos['link'],
				'user_id' => Auth::user()->id
			]);

			Session::flash('busca_success', 'Busca encontrada com sucesso');
			return redirect()->route('capturar.logado');
		}		
	}
	public function getArtigos()
	{
		$artigos = Artigos::all();
		return view('minhastelas.artigos', compact('artigos'));
	}
	public function ExcluirArtigo() 
	{
		$toDelete = $artigo->id;
		Artigos::where('id', $toDelete )->delete();


		return redirect()->route('artigos');
	}

}
