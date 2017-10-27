@extends('partials.layout')

@section('page-content')
    <div class="col-md-12">
        <header style="padding-bottom: 2em;">
            <h1>List of the Biggest Pokemons
                <small><em>BMRi can't accurately measure these giants</em></small>
            </h1>
        </header>

       <highlighted-pokemon-list></highlighted-pokemon-list>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3" style="min-height: 400px;">
                            <img class="img-responsive" width="100%" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/797.png">
                        </div>
                        <div class="col-md-9">
                            <h2>Celesteela</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection