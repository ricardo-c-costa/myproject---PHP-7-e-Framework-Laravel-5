<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes::post() Create
// Routes::get() Read
// Routes::put()patch() Update 
// Routes::delete() DELETE

// HOME ROUTES
Route::get('/', 'StaticPageController@getHome')->name('home');
Route::post('autenticar', 'DashboardController@Autenticar')->name('home.login');
Route::get('logout', 'DashboardController@logout')->name('logout');
// CAPTURAR ROUTES
Route::get('capturar', 'DashboardController@AuthSuccess')->name('capturar.logado');
Route::post('capturar', 'DashboardController@postCapturar')->name('capturar.send');
// ARTIGOS ROUTES
Route::get('artigos', 'DashboardController@getArtigos')->name('artigos');
Route::get('excluirartigo/{id}', ['as' => 'excluir.artigo', 'uses' => 'DashboardController@ExcluirArtigo']);
// Route::resource('artigos', 'DashboardController@getArtigos')->name('artigos.show');






// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
