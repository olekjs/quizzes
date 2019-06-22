<template>
    <div>
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="question" class="form-label">Pytanie: <strong>{{ question }}</strong></label>
                        <input id="question" type="text" class="form-control" v-model="question" :refresh="refresh">
                    </div>
                    <template>
                        <answer v-for="answer in currentStage.question.answers" :answer="answer" :key="answer.content" v-on:markAsCorrect="markAsCorrect"></answer>
                    </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            currentStage: {
                required: true,
                type: Object,
            },
        },
        data: function() {
            return {
                question: this.currentStage.question.content,
            }
        },
        components: {
            answer: require('../create-game/Answer.vue').default,
        },
        computed: {
            refresh: function() {
                return this.question = this.currentStage.question.content;
            },
        },
        watch: {
            question: function() {
                this.currentStage.question.content = this.question;
            }
        },
        methods: {
            markAsCorrect: function(answer) {
                this.markAsWrong(
                    this.getCorrectAnswer()
                );

                answer.type = 'correct';
            },
            getCorrectAnswer: function() {
                return this.currentStage.question.answers.find(function(answer){
                    return answer.type == 'correct';
                });
            },
            markAsWrong: function(answer) {
                answer.type = 'wrong';
            },
        },
    }
</script>
