<template>
    <div>
        <div class="card shadow mb-3" :class="{ 'border-success': isCorrect, 'border-danger': !isCorrect}">
            <h5 class="card-title text-center mt-3">{{ answer.selected.question_content }}</h5>
            <div class="card-body text-center">
                <p class="h2">Udzielona odpowiedź: {{ answer.selected.content }}</p>
                <p class="h5" v-show="!isCorrect">Poprawna odpowiedź: {{ answer.correct.content }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            answer: {
                required: true,
                type: Object,
            },
        },
        data: function() {
            return {
                isCorrect: this.answer.correct.content == this.answer.selected.content,
            }
        },
        methods: {
            //
        },
    }
</script>
