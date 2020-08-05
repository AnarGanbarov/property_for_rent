<template>
    <div class="container">
        <div class="row ">

            <label for="exampleFormControlSelect1">Название параметра:</label>
            <input type="text" v-model="current_parameter_name" class="form-control" id="exampleFormControlSelect1" placeholder="">

            <div class="div_with_all" style="width: 100%">
                <h6>Все параметры</h6>
                <div v-for="parameter in look_parameters" class="element_span" :id="parameter['id']"  v-on:click="clickForAddElement(parameter)">
                    <a href="/" onclick="event.preventDefault()" >
                        <span class="not_select_span_elem">{{parameter['name'] }} </span>
                    </a>
                    <input type="hidden" name="skill[]" :value="parameter['id']" >
                </div>
            </div>

            <div class="div_with_selected" style="margin-top:10px;">
                <h6>Выбранные навыки</h6>

                <div v-for="select in select_parameters" class="element_span_select" :id="select['id']" v-on:click="clickForDeleteElement(select)">
                    <span class="select_span_elem">{{select['name'] }}
                        <i class="fas fa-times"></i>
                    </span>
                    <input type="hidden" name="skill[]" :value="select['id']" >
                </div>
            </div>


        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'parameters'
        ],
        data: function () {
            // тут объявляются переменные.
            // если тут не объявлять переменную, то переменные будут статическими, а не динамическими.
            // Это значит, что они не будут обновляться в тегах в коде html.
            return {
                'current_parameter_name': '',
                'all_parameters': [],
                'look_parameters': [],
                'select_parameters': []
            }
        },
        methods: {
            clickForAddElement: function (parameter) {
                // console.log(parameter);
                this.select_parameters.push(parameter);
            },
            clickForDeleteElement: function (select) {
                this.select_parameters.pop(select);
            }
        },
        mounted() {
            console.log(this.parameters);
            for(var i = 0; i < this.parameters.length; i++)
            {
                this.all_parameters.push({
                        "id": this.parameters[i]['id'],
                        "name": this.parameters[i]['name']
                });
            }

            this.look_parameters = this.all_parameters.slice(0, 10); // взять первые 10 элементов
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
            }
        },


    }
</script>
