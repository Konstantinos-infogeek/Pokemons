<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Api version 1
Route::group([ "prefix" => "v1", "namespace" => 'Api'], function () {
	
  Route::get('pokemon', ['as' => 'api.pokemon.index', 'uses' => 'PokemonController@index']);
  Route::get('pokemon/highlighted', ['as' => 'api.pokemon.highlighted', 'uses' => 'PokemonController@getHighlighted']);
  Route::post('pokemon/load', ['as' => 'api.pokemon.load', 'uses' => 'PokemonController@load']);
  Route::post('pokemon/store', ['as' => 'api.pokemon.store', 'uses' => 'PokemonController@store']);
  Route::post('pokemon/highlight', ['as' => 'api.pokemon.highlight', 'uses' => 'PokemonController@highlight']);
  
});


