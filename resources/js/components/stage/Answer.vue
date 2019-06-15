<template>
    <div class="col-md-6 col-6">
        <button class="btn btn-outline-primary btn-lg btn-block mb-2" v-on:click="select">
            {{ answer.content }}
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
                
            }
        },
        created: function() {
            if (this.answer.type == 'correct') {
                this.$emit('saveCorrect', this.answer);
            }
        },
        methods: {
            select: function() {
                this.$emit('select', this.answer);
            }
        },
    }
</script>
