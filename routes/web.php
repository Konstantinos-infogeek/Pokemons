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

//Home page
Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

//Pokemon Section
Route::prefix('pokemon')->group(function(){
  Route::get('index', ['as' => 'web.pokemon.index', 'uses' => 'PokemonProfileController@index']);
  Route::get('loader', ['as' => 'web.pokemon.loader', 'uses' => 'PokemonProfileController@loader']);
});

