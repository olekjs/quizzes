<template>
    <div>
        <div class="card mb-3">
            <div class="card-body text-center">
                <button class="btn btn-primary mr-2">Zapisz odpowiedzi</button>
                <button class="btn btn-primary">Wróć na stronę główną</button>
            </div>
        </div>
        <template>
            <answer v-for="answer in answers" :key="answer.id" :answer="answer"></answer>
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            answers: {
                required: true,
            },
        },
        data: function() {
            return {
                //
            }
        },
        components: {
            answer: require('./end-game/Answer.vue').default,
        },
        methods: {
            answerType: function(value) {
                return value == 'correct' ? 'Poprawna' : 'Zła';
            },
        },
    }
</script>
