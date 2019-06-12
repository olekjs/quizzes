<template>
    <div class="col-md-12">
        <div class="card mb-2">
            <div class="card-body text-center shadow-sm">
                <strong><h3>{{ stage.question.content }}</h3></strong>
            </div>
        </div>
        <div class="row text-center">
            <answer v-for="answer in shuffledAnswers" :key="answer.id" :answer="answer" v-on:select="selectAnswer"></answer>
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
                //
            }
        },
        components: {
            answer: require('./Answer.vue').default,
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
            selectAnswer: function(selectedAnswer) {
                this.$emit('saveAnswer', selectedAnswer, this.stage.question.content);
            },
        },
    }
</script>
