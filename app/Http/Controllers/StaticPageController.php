<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Session;

class StaticPageController extends Controller
{
	public function getHome()
	{
		return view('minhastelas.home');
	}
}
