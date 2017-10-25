<?php

namespace PokeApp\Http\Controllers;

use PokeApp\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pokemon.index.blader');
  }
  
  
  
  /**
   * Display the specified resource.
   *
   * @param  \PokeApp\Models\Pokemon  $pokemon
   * @return \Illuminate\Http\Response
   */
  public function show(Pokemon $pokemon)
  {
    //
  }
  
  /**
   * Show the form for editing the specified resource.
   *
   * @param  \PokeApp\Models\Pokemon  $pokemon
   * @return \Illuminate\Http\Response
   */
  
  /**
   * Remove the specified resource from storage.
   *
   * @param  \PokeApp\Models\Pokemon  $pokemon
   * @return \Illuminate\Http\Response
   */
  public function loader(Pokemon $pokemon)
  {
    return view('pokemon.loader');
  }
}
