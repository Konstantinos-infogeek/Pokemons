<?php

namespace PokeApp\Http\Controllers;

use PokeApp\Models\PokemonProfile;
use Illuminate\Http\Request;

class PokemonProfileController extends Controller
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
     * @param  \PokeApp\Models\PokemonProfile  $pokemonProfile
     * @return \Illuminate\Http\Response
     */
    public function show(PokemonProfile $pokemonProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PokeApp\Models\PokemonProfile  $pokemonProfile
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PokeApp\Models\PokemonProfile  $pokemonProfile
     * @return \Illuminate\Http\Response
     */
    public function loader(PokemonProfile $pokemonProfile)
    {
        return view('pokemon.loader');
    }
}
