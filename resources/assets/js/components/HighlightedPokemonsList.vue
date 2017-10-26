<template>
    <div class="panel panel-default pull-down">
        <div class="panel-body">
            <br/>
            <br/>
            <div class="col-sm-12">
                <div class="container-fluid">
                    <div class="row">
                        <table class="table table-hover" id="pokemon-table">
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
                                <tr>
                                    <td>
                                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png">
                                    </td>
                                    <td>Bulbasaur</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>64</td>
                                </tr>
                            </tbody>
                        </table>

                        <nav>
                            <ul class="pager">
                                <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
                                <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
            };
        },
        mounted(){

        },
        created() {
            let that = this;
        },
        methods: {

        }
    }
</script>