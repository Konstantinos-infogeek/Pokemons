@extends('partials.layout')

@section('page-content')
    <div class="col-md-12">
        <header>
            <h1>Load Database</h1>
        </header>
        <load-pokemons-form></load-pokemons-form>

        <store-filtered-pokemon-form></store-filtered-pokemon-form>

        <highlight-pokemon-form></highlight-pokemon-form>
    </div>

@endsection