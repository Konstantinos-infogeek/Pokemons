<template>
    <div class="panel panel-default" id="king-panel" v-if="king">
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 poke-thumbnail">
                        <!--THUMBNAIL-->
                        <img class="img-responsive" :src="king.sprite">
                        <h3 style="color: purple; word-spacing: 0.5em;" class="text-center">Long Live the King!</h3>
                    </div>
                    <div class="col-md-9">
                        <h2 class="text-capitalize">
                            <span style="color: royalblue">King </span>
                            <strong>{{king.owner.name}}</strong>
                            <small style="font-size: .5em"> Stat Total: <em>{{king.statTotal}}</em></small>
                        </h2>

                        <!--BASIC INFO-->
                        <div class="col-md-6">
                            <div class="lead stats" style="padding-left: 0;">
                                <p>
                                    <strong>Height:</strong> <span>{{king.height}}</span>
                                </p>
                                <p>
                                    <strong>Weight:</strong> <span>{{king.weight}}</span>
                                </p>
                                <p>
                                    <strong>Base Experience</strong> <span>{{king.experience}}</span>
                                </p>
                                <p>
                                    <strong>Types:</strong> <span>{{types}}</span>
                                </p>
                            </div>
                        </div>
                        <!--BASIC INFO END-->

                        <!--STATS INFO-->
                        <div class="col-md-6">
                            <div class="lead stats" style="background-color: #abc4d3;color: #0e0e0e;">
                                <p v-for="item in stats">
                                    <strong class="text-capitalize">{{item.stat.name}}:</strong> <span>{{item.base_stat}}</span>
                                </p>
                            </div>
                        </div>
                        <!--STATS INFO END-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    function calculateStringTypes(types) {
        return types.map( (current) => current.type.name).join(', ');
    }
    function scrollToBottom(){
        //Wait a bit and scroll to Kings Panel
        setTimeout(function(){
            window.scrollTo(0,document.body.scrollHeight + 400);
        }, 300)
    }
    
    //Component Module
    export default {
        data: function () {
            return {
                king: false,
                stats: '',
                types: ''
            };
        },
        //This method downloads the content for the first time
        created() {
            let that = this;
            broadcaster.$on('declarePokemonKingCompleted', function(data){
                that.ChangeKing(data);
            });
        },
        methods: {
            ChangeKing: function(data){
                let that = this;
                let king = data;

                that._data.king = king;
                that._data.types = calculateStringTypes(king.owner.profile.types);
                that._data.stats = king.owner.profile.stats;

                //Scroll to Kings Panel
                scrollToBottom();
            }
        }
    }
</script>