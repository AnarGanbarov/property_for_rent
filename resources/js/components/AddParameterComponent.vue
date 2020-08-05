<template>
    <div class="container">
        <div class="row ">

            <div style=" width: 100%;"></div>
            <label for="exampleFormControlSelect1">Поиск по параметрам:</label>
            <input type="text" v-model="current_parameter_name" class="form-control" id="exampleFormControlSelect1" placeholder="">

            <div class="div_with_all" style="width: 100%">
                <br>
                <h6>Все параметры</h6>
                <div v-for="parameter in look_parameters" class="element_span" :id="parameter['id']"  v-on:click="clickForAddElement(parameter)">
                    <a href="/" onclick="event.preventDefault()" >
                        <span class="not_select_span_elem">{{parameter['name'] }} </span>
                    </a>
<!--                    <input type="hidden" name="parameter[]" :value="parameter['id']" >-->
                </div>
            </div>

            <div class="div_with_selected" style="margin-top:10px; margin-bottom: 30px;">
                <h6>Выбранные параметры</h6>

                <div v-for="select in select_parameters" class="element_span_select" :id="select['id']" v-on:click="clickForDeleteElement(select)">
                    <span class="select_span_elem">{{select['name'] }}
                        <i class="fas fa-times"></i>
                    </span>
                    <input type="hidden" name="parameters[]" :value="select['id']" >
                </div>
            </div>


            <hr>
            <br><br>

            <div style="display: block; clear: both; width: 100%;">
                <label for="exampleFormControlSelect2">Поиск по удобствам:</label>
                <input type="text" v-model="current_convenience_name" class="form-control" id="exampleFormControlSelect2" placeholder="">
            </div>

            <div class="div_with_all" style="width: 100%">
                <br>
                <h6>Все параметры</h6>
                <div v-for="parameter in look_conveniences" class="element_span" :id="parameter['id']"  v-on:click="clickForAddElementConveniences(parameter)">
                    <a href="/" onclick="event.preventDefault()" >
                        <span class="not_select_span_elem">{{parameter['name'] }} </span>
                    </a>
<!--                    <input type="hidden" name="conveniences[]" :value="parameter['id']" >-->
                </div>

                <div class="div_with_selected" style="margin-top:10px; margin-bottom: 30px;">
                    <h6>Выбранные параметры</h6>

                    <div v-for="select in select_conveniences" class="element_span_select" :id="select['id']" v-on:click="clickForDeleteElementConveniences(select)">
                    <span class="select_span_elem">{{select['name'] }}
                        <i class="fas fa-times"></i>
                    </span>
                        <input type="hidden" name="conveniences[]" :value="select['id']" >
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'parameters',
            'conveniences'
        ],
        data: function () {
            return {
                'current_parameter_name': '',
                'all_parameters': [],
                'look_parameters': [],
                'select_parameters': [],

                'current_convenience_name': '',
                'all_conveniences': [],
                'look_conveniences': [],
                'select_conveniences': [],
            }
        },
        methods: {
            clickForAddElement: function (parameter) {
                // console.log(parameter);
                this.select_parameters.push(parameter);
            },
            clickForDeleteElement: function (select) {
                this.select_parameters.pop(select);
            },


            clickForAddElementConveniences: function (parameter) {
                // console.log(parameter);
                this.select_conveniences.push(parameter);
            },
            clickForDeleteElementConveniences: function (select) {
                this.select_conveniences.pop(select);
            }


        },
        mounted() {
            // console.log(this.parameters);
            for(var i = 0; i < this.parameters.length; i++)
            {
                this.all_parameters.push({
                        "id": this.parameters[i]['id'],
                        "name": this.parameters[i]['name']
                });
            }

            this.look_parameters = this.all_parameters.slice(0, 20); // взять первые 20 элементов



            for(var ii = 0; ii < this.conveniences.length; ii++)
            {
                this.all_conveniences.push({
                    "id": this.conveniences[ii]['id'],
                    "name": this.conveniences[ii]['name']
                });
            }

            this.look_conveniences = this.all_conveniences.slice(0, 20); // взять первые 20 элементов
        },
        watch: {
            current_parameter_name: function () {
                if(this.current_parameter_name != "")
                {
                    this.look_parameters = [];
                    for(var i = 0; i < this.parameters.length; i++)
                    {
                        if(this.parameters[i]['name'].indexOf(this.current_parameter_name) + 1)
                        {
                            this.look_parameters.push({
                                "id": this.parameters[i]['id'],
                                "name": this.parameters[i]['name']
                            });
                        }

                    }
                }else {
                    this.look_parameters = this.all_parameters;
                }
            },

            current_convenience_name: function () {
                if(this.current_convenience_name != "")
                {
                    this.look_conveniences = [];
                    for(var i = 0; i < this.conveniences.length; i++)
                    {
                        if(this.conveniences[i]['name'].indexOf(this.current_convenience_name) + 1)
                        {
                            this.look_conveniences.push({
                                "id": this.conveniences[i]['id'],
                                "name": this.conveniences[i]['name']
                            });
                        }

                    }
                }else {
                    this.look_conveniences = this.all_conveniences;
                }
            }
        },


    }
</script>
