@extends('partials.layout')

@section('page-content')
    <div class="col-md-12">
        <header>
            <h1>Load Database</h1>
        </header>
        <div class="panel panel-default pull-down">
            <div class="panel-heading">
                <h4>Import Some Pokemon</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-8 pull-down">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3"
                                   class="col-sm-2 control-label">Url</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control"
                                       id="api-url"
                                       name="api-url"
                                       value="http://pokeapi.co/api/v2/pokemon/?limit=99999"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">
                                    Load
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection