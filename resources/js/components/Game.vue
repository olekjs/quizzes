<template>
    <div>
        <div class="row">
            <!-- 
                @TODO
                Aby zagrać w grę trzeba wpisać nick
             -->
            <div class="col-md-12 text-center" v-if="!isStarted">
                <button class="btn btn-success btn-lg" v-on:click="startGame">Zacznij grę</button>
                <button class="btn btn-success btn-lg">Wróć do strony głównej</button>
            </div>
            <template v-if="stage && isStarted && !isEndGame">
                <questionsRange :stageInformations="stageInformations"></questionsRange>
                <stage :stage="stage" v-on:saveAnswer="saveAnswer"></stage>
            </template>
            <template v-if="isEndGame">
                <endGame :answers="this.answers"></endGame>
            </template>
        </div>
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
                stageInformations: {
                    actualStage: 0,
                    allStages: this.game.stages.length -1,
                },
            }
        },
        components: {
            stage: require('./Stage.vue').default,
            questionsRange: require('./QuestionsRange.vue').default,
            endGame: require('./EndGame.vue').default,
        },
        methods: {
            startGame: function() {
                this.isStarted = true;
                this.getStage();
            },
            getStage: function() {
                this.stage = this.game.stages[this.stageInformations.actualStage];

            },
            saveAnswer: function(answer, question) {
                answer.question_content = question;
                this.answers.push(answer);
                this.nextQuestion();
            },
            nextQuestion: function() {
                let stageInformations = this.stageInformations;

                if (stageInformations.actualStage == stageInformations.allStages) {
                    this.isEndGame = true;
                    return;
                }

                this.stageInformations.actualStage++;
                this.getStage();
            },
        },
        beforeRouteLeave (to, from , next) {
            const answer = window.confirm('Do you really want to leave? you have unsaved changes!')
        }
    }
</script>
