<template>
    <div>
        <div class="row">
            <div class="col-md-6 text-left h3">
                Etapy gry:
            </div>
            <div class="col-md-6 text-right">
                <i class="fa fa-plus-circle mb-3" style="font-size: 30px; color: green; cursor: pointer;" v-on:click="addStage"></i>
            </div>
            <div class="col-md-12 mb-2 row" v-for="(stage, index) in stages">
                <div class="col-md-10">
                    <button class="btn btn-outline-secondary btn-block" v-on:click="showStage(index)">{{ stage.number }}. {{ stage.question.content }}</button>
                </div>
                <div class="col-md-2" v-show="stage.number > 1">
                    <i class="fa fa-trash mt-2" style="font-size: 25px; color: red; cursor: pointer;" v-on:click="removeStage(index)"></i>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            stages: {
                required: true,
                type: Array,
            }
        },
        data: function() {
            return {
                //
            }
        },
        methods: {
            addStage: function() {
                this.$emit('addStage');
            },
            removeStage: function(index) {
                this.$emit('removeStage', index);
            },
            showStage: function(index) {
                this.$emit('showStage', index);
            }
        },
    }
</script>
