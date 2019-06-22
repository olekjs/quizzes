<template>
    <div>
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="question" class="form-label">Pytanie: <strong>{{ question }}</strong></label>
                        <input id="question" type="text" class="form-control" v-model="question">
                    </div>
                    <div class="col-6 mb-2" v-for="answer in currentStage.question.answers">
                        <button class="btn btn-block" v-bind:class="{ 'btn-success': answer.type == 'correct', 'btn-danger': answer.type == 'wrong' }" v-on:click="markAsCorrect(answer)">{{ answer.content }}</button>
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
                question: '',
            }
        },
        watch: {
            question: function() {
                this.saveQuestion();
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
            saveQuestion: function() {
                this.$emit('saveQuestion', this.question, this.currentStage.number);
            },
        },
    }
</script>
