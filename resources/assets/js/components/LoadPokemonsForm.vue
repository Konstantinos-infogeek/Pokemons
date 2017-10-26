<template>
    <div class="panel panel-primary pull-down">
        <div class="panel-heading">
            <h4>Import Some Pokemon</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 pull-down">
                <form class="form-horizontal" @submit.prevent="post">
                    <div class="form-group">
                        <label for="api-url"
                               class="col-sm-2 control-label">Url</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control"
                                   id="api-url"
                                   name="api-url"
                                   v-model="url"
                                   readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">
                                Load <span class="loader" v-if="loaderActive"></span>
                            </button>
                            <span v-if="count > 0" style="vertical-align: sub">Found: <span style="font-style: italic;">{{count}} Pokemons</span></span>
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
                count: false,
                url: 'http://pokeapi.co/api/v2/pokemon/?limit=99999'
            };
        },
        methods: {
            post: function () {
                let that = this;
                that._data.loaderActive = true;

                axios.post('/api/v1/pokemon/load', {'api-url': this.url})
                    .then(function (response) {
                        that._data.count = response.data.count;
                        toastr.success("Api request is done!");
                        that._data.loaderActive = false;
                        broadcaster.$emit('pokemonRequestCompleted', response.data);
                    });
            }
        }
    }
</script>