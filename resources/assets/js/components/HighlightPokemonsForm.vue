<template>
    <div class="panel panel-primary pull-down" v-if="show">
        <div class="panel-heading">
            <h4>Highlight Pokemons <small style="color: white">the most powerfull of all</small></h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 pull-down">
                <form class="form-horizontal" @submit.prevent="post">

                    <div class="form-group">
                        <div class="col-md-offset-1 col-sm-10">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
                                        <button type="submit" class="btn btn-default btn-lg btn-block center-block">
                                            Highlight <span v-if="loaderActive" class="loader pull-right" style="margin-top: 3px;"></span>
                                        </button>

                                        <span v-if="count > 0" style="vertical-align: sub"><em style="opacity: 0.8;">{{count}}</em> Pokemons has been selected</span>
                                    </div>
                                </div>
                            </div>
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
                show: false,
                loaderActive: false,
                count: 0,
                list: []
            };
        },
        created(){
            let that = this;
            broadcaster.$on('storeFilteredPokemonsCompleted', function(data){
                that._data.show = true
            });
        },
        methods: {
            post: function () {
                let that = this;
                that._data.loaderActive = true;

                axios.post('/api/v1/pokemon/highlight', {})
                    .then(function (response) {
                        that._data.count = response.data.count;
                        toastr.success(response.data.message);
                        that._data.loaderActive = false;
                        broadcaster.$emit('pokemonRequestCompleted', response.data);
                    });
            }
        }
    }
</script>