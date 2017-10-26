<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PokeApp') }}</title>

    @include('partials.icons')

    <!-- CSS Styles -->
    <link rel="stylesheet" href="{{asset('css/components.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container-fluid" id="app">
        <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <!-- <div class="absolute-wrapper"> </div> -->
        <!-- Menu -->
        <div class="side-menu">
        
        <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="brand-wrapper">
                <!-- Hamburger -->
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Brand -->
                <div class="brand-name-wrapper">
                    <a class="navbar-brand" href="#">
                        PokeApp
                    </a>
                </div>

                <!-- Search -->
                {{--  <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                    <span class="glyphicon glyphicon-search"></span>
                </a>  --}}

                <!-- Search body -->
                <div id="search" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form class="navbar-form" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- Main Menu -->
        <div class="side-menu-container">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('home.index')}}">
                        <span class="glyphicon glyphicon-home"></span> Home
                    </a>
                </li>
                <li>
                    <a href="{{route('web.pokemon.loader')}}">
                        <span class="glyphicon glyphicon-cog"></span> Load
                        Pokemons
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-th-list"></span> Show Pokemons
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
        
        </div>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body"> 
                @yield('page-content')                          
            </div>
        </div>
    </div>
</div>

    <!-- CSS Styles -->
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>