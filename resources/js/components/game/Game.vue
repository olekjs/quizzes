<template>
    <div>
        <template>
            <settings :gameId="game.id" v-on:startGame="startGame" v-if="!isStarted"></settings>
        </template>
        <template v-if="stage && isStarted && !isEndGame">
            <questionsRange :informations="informations"></questionsRange>
            <stage :stage="stage" v-on:saveAnswer="saveAnswer"></stage>
        </template>
        <template v-if="isEndGame">
            <endGame :answers="this.answers"></endGame>
        </template>
        <template>
            <notifications group="alert" width="400px" position="top center" class="mt-2"/>
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            game: {},
        },
        data: function() {
            return {
                isStarted: false,
                isEndGame: false,
                stage: {},
                answers: [],
                playerId: '',
                informations: {
                    currentStage: 0,
                    allStages: this.game.stages.length -1,
                },
            }
        },
        components: {
            settings: require('../game/Settings.vue').default,
            stage: require('../game/Stage.vue').default,
            questionsRange: require('../game/QuestionsRange.vue').default,
            endGame: require('../game/EndGame.vue').default,
        },
        methods: {
            startGame: function(nickname, playerId) {
                this.playerId = playerId;
                this.isStarted = true;
                this.getStage();
            },
            getStage: function() {
                this.stage = this.game.stages[this.informations.currentStage];

            },
            saveAnswer: function(answer, question, correct) {
                answer.question_content = question;
                let selected = answer;
                this.answers.push({selected, correct});
                this.nextQuestion();
            },
            nextQuestion: function() {
                let informations = this.informations;

                if (informations.currentStage == informations.allStages) {
                    this.endGame();
                    return;
                }

                this.informations.currentStage++;
                this.getStage();
            },
            endGame: function() {
                this.isEndGame = true;
            },
        },
    }
</script>
