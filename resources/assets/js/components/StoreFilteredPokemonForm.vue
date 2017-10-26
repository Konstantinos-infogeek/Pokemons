<template>
    <div class="panel panel-default pull-down" v-if="pokemons">
        <div class="panel-heading">
            <h4>Store retrieved data to the Database</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 pull-down">
                <form class="form-horizontal" @submit.prevent="post">
                    <div class="form-group">
                        <label for="api-url"
                               class="col-sm-2 control-label">Url</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="min-height:10em;"
                                      id="api-url"
                                      name="api-url"
                                      v-model="pokemonsString"
                                      readonly>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">
                                Load <span class="loader" v-if="loaderActive"></span>
                            </button>
                            <!--<span v-if="count > 0">Count: {{count}}</span>-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                loaderActive: false,
                pokemons: false,
                pokemonsString: 'No data yet!',
            };
        },
        created(){
            var that = this;
            broadcaster.$on('pokemonRequestCompleted', function(data){
                that.setPokemonData(data);
            });
        },
        methods: {
            setPokemonData(data){
                this._data.pokemonsString = JSON.stringify(data.results);
                this._data.pokemons = data.results;
            },
            post: function () {
                let that = this;
                that._data.loaderActive = true;
                axios.post('/api/v1/pokemon/store', {})
                    .then(function (response) {
                        that._data.loaderActive = false;

                        if(response.data.code == 100){
                            toastr.success(response.data.message);
                        }
                    });
            }
        }
    }
</script>