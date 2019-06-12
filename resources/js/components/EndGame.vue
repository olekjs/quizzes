<template>
    <div class="col-md-12">
        <div v-for="answer in answers">
            Pytanie: {{ answer.question_content }}
            <p>Twoja odpowiedź: {{ answer.content }} ({{ answerType(answer.type) }})</p>
        </div>
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
        methods: {
            answerType: function(value) {
                return value == 'correct' ? 'Poprawna' : 'Zła';
            }
        },
    }
</script>
