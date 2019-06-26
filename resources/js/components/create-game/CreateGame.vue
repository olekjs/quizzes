<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <stage :stages="stages" v-on:addStage="addStage" v-on:removeStage="removeStage" v-on:showStage="showStage"></stage>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <template>
                    <settings :categories="categories" v-on:saveGame="saveGame" :existSettings="existSettings"></settings>
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
            existStages: {
                type: Array,
            },
            existSettings: {
                type: Object,
            },
            uniqueCode: {
                type: String,
            }
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
        mounted: function() {
            if (this.existStages.length > 0) {
                this.stages = this.existStages;
            }
        },
        methods: {
            saveGame: function(settings) {
                if (!this.validateSettings(settings)) {
                    return;
                }

                axios.post('/api/save/game', {
                    stages: this.stages,
                    settings: settings,
                    unique_code: this.uniqueCode,
                }).then((response) => {
                    //odeslij gdzies z komunikatem
                }).catch(() => {
                    this.alert('error', 'Wystąpił błąd z połączeniem. Spróbuj ponownie.');
                });
            },
            addStage: function() {
                if (this.stages.length === 20) {
                    this.alert('error', 'Dopuszczana liczba poziomów: 20.');
                    return;
                }

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
