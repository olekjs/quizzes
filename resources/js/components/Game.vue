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
                <questionsRange></questionsRange>
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
                actualStage: 0,
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
                this.stage = this.game.stages[this.actualStage];

            },
            saveAnswer: function(answer, question) {
                answer.question_content = question;
                this.answers.push(answer);
                this.nextQuestion();
            },
            nextQuestion: function() {
                let maxStages = this.game.stages.length - 1;

                if (this.actualStage == maxStages) {
                    this.isEndGame = true;
                    return;
                }

                this.actualStage++;
                this.getStage();
            },
        }
    }
</script>
