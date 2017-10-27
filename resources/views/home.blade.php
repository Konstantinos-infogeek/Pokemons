@extends('partials.layout')

@section('page-content')
    <div class="col-md-12">
        <header>
            <h1>Welcome to PokeApp</h1>
        </header>

        <div class="container-fluid pull-down">
            <div class="row">
                <div class="panel panel-default" id="important-to-remember">
                    <div class="panel-heading">
                        Important to Remember
                    </div>
                    <div class="panel-body">
                        <dl>
                            <dt>Edit php.ini</dt>
                            <dd>set <span class="remember-command">max_execution_time</span> and <span class="remember-command">max_input_time</span> to 3600 or generally a big number of seconds</dd>

                            <dt>Run the Laravel Installation</dt>
                            <dd>
                                <span class="remember-command">composer install</span> | <span class="remember-command">npm install</span> | <span class="remember-command">npm run dev</span> or <span class="remember-command">npm run prod</span>
                            </dd>

                            <dt>Second Step is taking a long time</dt>
                            <dd>If you have the <u>php.ini</u> values already set. Second step will make around 940 http requests, it ll take several minutes, if you have the need to have an indication of this actually working, there is a commented Logger code line, just before start this step, just uncomment the <strong>line 184 in Api\PokemonController</strong></dd>
                        </dl>

                        <p>Click <a href="https://youtu.be/MGPjD8peGD0" target="_blank">here</a> to see a video presentation instead, to have a better grasp of the application</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
@endsection