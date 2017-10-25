<?php

namespace PokeApp\Http\Controllers\Api;

use Illuminate\Http\Request;
use PokeApp\Http\Controllers\Controller;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['pokemon' => 10];
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function load(){
      return ['loader' => 'load'];
    }
}
