<template>
    <div class="col-6 mb-2">
        <button class="btn btn-block" 
            v-bind:class="answerType" 
            v-on:click="markAsCorrect">
            <input type="text" class="btn btn-block" v-model="content">
        </button>
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
                content: this.answer.content,
            }
        },
        watch: {
            content: function() {
                this.answer.content = this.content;
            }
        },
        computed: {
            answerType: function() {
                return this.answer.type == 'correct' ? 'btn-outline-success' : 'btn-outline-danger';
            }
        },
        methods: {
            markAsCorrect: function() {
                this.$emit('markAsCorrect', this.answer);
            },
        },
    }
</script>
