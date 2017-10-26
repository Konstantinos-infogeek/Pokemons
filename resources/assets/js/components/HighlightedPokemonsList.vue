<template>
    <div class="panel panel-default pull-down">
        <div class="panel-body">
            <br/>
            <br/>
            <div class="col-sm-12">
                <div class="container-fluid">
                    <div class="row">
                        <table class="table table-hover" id="pokemon-table" v-if="pageContent">
                            <thead>
                                <tr>
                                    <th>Sprite</th>
                                    <th>Name</th>
                                    <th>Height</th>
                                    <th>Weight</th>
                                    <th>Base Experience</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="pokemon in pageContent">
                                    <td>
                                        <img :src="pokemon.sprite">
                                    </td>
                                    <td class="text-capitalize">{{pokemon.name}}</td>
                                    <td>{{pokemon.height}}</td>
                                    <td>{{pokemon.weight}}</td>
                                    <td>{{pokemon.experience}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <nav>
                            <ul class="pager">
                                <li :class="{ 'previous': true, 'disabled': previous < 1 }">
                                    <a href="#" v-on:click.prevent="getPage(previous)"><span aria-hidden="true">&larr;</span> Older</a>
                                </li>
                                <li>Current Page: {{page}} / {{max}}</li>
                                <li :class="{ 'next': true, 'disabled': next > max  }">
                                    <a href="#" v-on:click.prevent="getPage(next)">Newer <span aria-hidden="true">&rarr;</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

    /**
     * Stop pages from getting invalid (negative) page numbers
     *
     * @param pageNumber
     * @return {number}
     */
    function evaluatePage(pageNumber){
        return pageNumber >= 1 ? pageNumber : 1;
    }

    //Component Module
    export default {
        data: function () {
            return {
                page: 1,
                pageContent: false, //contains the list of pokemons
                previous: 0,
                next: 2,
                max: 9999
            };
        },
        //This method downloads the content for the first time
        created() {
            let that = this;
            that.getPage(that._data.page);
        },
        methods: {
            getPage: function (page) {
                let that = this;

                if(page <= that._data.max) { //Block from calling page numbers bigger than last page
                    axios
                        .get('/api/v1/pokemon/highlighted/?page=' + page)
                        .then(function (response) {

                            //Assign new data from api response
                            that._data.pageContent = response.data.data;
                            that._data.page        = response.data.current_page;
                            that._data.previous    = evaluatePage(response.data.current_page - 1);
                            that._data.next        = evaluatePage(response.data.current_page + 1);
                            that._data.max         = response.data.last_page;
                        });
                }
            }
        }
    }
</script>