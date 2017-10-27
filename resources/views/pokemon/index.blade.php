@extends('partials.layout')

@section('page-content')
    <div class="col-md-12">
        <header style="padding-bottom: 2em;">
            <h1>List of the Biggest Pokemons
                <small><em>BMRi can't accurately measure these giants</em></small>
            </h1>
        </header>

       <highlighted-pokemon-list></highlighted-pokemon-list>

        <pokemon-king-info-panel></pokemon-king-info-panel>
    </div>

@endsection