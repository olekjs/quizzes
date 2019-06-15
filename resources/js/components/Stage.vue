<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-body text-center shadow-sm">
                    <strong><h3>{{ stage.question.content }}</h3></strong>
                </div>
            </div>
            <div class="row text-center">
                <answer v-for="answer in shuffledAnswers" :key="answer.id" :answer="answer" v-on:select="selectAnswer" v-on:saveCorrect="saveCorrect"></answer>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            stage: {
                required: true,
                type: Object,
            },
        },
        data: function() {
            return {
                correctAnswer: [],
            }
        },
        components: {
            answer: require('./stage/Answer.vue').default,
        },
        computed: {
            shuffledAnswers: function() {
                return this.shuffle(this.stage.question.answers);
            },
        },
        methods: {
            shuffle: function(arr) {
                let len = arr.length, temp, index;
                    while (len > 0) {
                        index = Math.floor(Math.random() * len);
                        len--;
                        temp = arr[len];
                        arr[len] = arr[index];
                        arr[index] = temp;
                    }

                    return arr;
            },
            selectAnswer: function(selected) {
                this.$emit('saveAnswer', selected, this.stage.question.content, this.correctAnswer);
            },
            saveCorrect: function(answer) {
                this.correctAnswer = answer;
            }
        },
    }
</script>
