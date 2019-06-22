<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <!-- 
                            @TODO
                            Limit poziomów
                         -->
                        <stage :stages="stages" v-on:addStage="addStage" v-on:removeStage="removeStage" v-on:showStage="showStage"></stage>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <template>
                    <settings :categories="categories" v-on:saveGame="saveGame"></settings>
                </template>
                <template>
                    <question :currentStage="stages[currentStage]"></question>
                </template>
            </div>
        </div>
        <template>
            <notifications group="alert" width="400px" position="top center" class="mt-2"/>
        </template>
    </div>
</template>
<script>
    export default {
        props: {
            categories: {
                required: true,
                type: Array,
            },
        },
        data: function() {
             return {
                stages: [{
                    number: 1,
                    question: {
                        content: 'Treśc pytania',
                        answers: [{
                                content: 'Zielona',
                                type: 'correct',
                            },
                            {
                                content: 'Odpowiedź',
                                type: 'wrong',
                            },
                            {
                                content: 'Jest',
                                type: 'wrong',
                            },
                            {
                                content: 'Prawidłowa',
                                type: 'wrong',
                            }]
                        },
                    }],
                currentStage: 0,
            }
        },
        components: {
            settings: require('../create-game/Settings.vue').default,
            stage: require('../create-game/Stage.vue').default,
            question: require('../create-game/Question.vue').default,
        },
        methods: {
            saveGame: function(settings) {
                if (!this.validateSettings(settings)) {
                    return;
                }

                axios.post('/api/create/game', {
                    stages: this.stages,
                    settings: settings,
                }).then((response) => {
                    console.log(response.data);
                }).catch(() => {
                    this.alert('error', 'Wystąpił błąd z połączeniem. Spróbuj ponownie.');
                });
            },
            addStage: function() {
                this.stages.push({
                    number: this.stages.length + 1,
                    question: {
                        content: 'Treśc pytania',
                        answers: [{
                            content: 'Zielona',
                            type: 'correct',
                        },
                        {
                            content: 'Odpowiedź',
                            type: 'wrong',
                        },
                        {
                            content: 'Jest',
                            type: 'wrong',
                        },
                        {
                            content: 'Prawidłowa',
                            type: 'wrong',
                        }]
                    },
                });
                this.sortStages();
            },
            removeStage: function(index) {
                this.stages.splice(index, 1);
                this.currentStage = index - 1;
                this.sortStages();
            },
            showStage: function(index) {
                this.currentStage = index;
            },
            sortStages: function() {
                this.stages.forEach(function(stage, index){
                    if (stage.length == index) {
                        return;
                    }

                    if (stage.number != index++) {
                        stage.number = index++;
                    }
                });
            },
            validateSettings: function(settings) {
                if (!settings.title) {
                    this.alert('error', 'Tytuł gry jest wymagany');
                }

                if (!settings.category) {
                    this.alert('error', 'Kategoria gry jest wymagana');
                }

                if (settings.title && settings.category) {
                    return true;
                }
            },
            alert: function(type, text) {
                this.$notify({
                    group: 'alert',
                    type: type,
                    text: text,
                });
            },
        },
    }
</script>
