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
                    <settings :categories="categories"></settings>
                </template>
                <template>
                    <question :currentStage="stages[currentStage]" v-on:saveQuestion="saveQuestion"></question>
                </template>
                </div>
            </div>
        </div>
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
                stageLength: 2,
            }
        },
        components: {
            settings: require('../create-game/Settings.vue').default,
            stage: require('../create-game/Stage.vue').default,
            question: require('../create-game/Question.vue').default,
        },
        methods: {
            addStage: function() {
                this.stages.push({
                    number: this.stageLength++,
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
            },
            removeStage: function(index) {
                this.stages.splice(index, 1);
                this.sortStages();
            },
            showStage: function(index) {
                this.currentStage = index;
            },
            saveQuestion: function(content, number) {
                let stage = this.getStage(number);
                stage.question.content = content;
            },
            getStage: function(number) {
                return this.stages.find(function(stage) {
                    return stage.number = number;
                });
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
        },
    }
</script>
