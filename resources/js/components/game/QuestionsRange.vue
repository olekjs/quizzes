<template>
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="progress" style="height: 20px;">
                <div class="progress-bar" role="progressbar" v-bind:style="{ width: progressWidth + '%'}" :aria-valuenow="informations.currentStage" :aria-valuemax="informations.allStages" aria-valuemin="0"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            informations: {
                required: true,
                type: Object,
            },
        },
        data: function() {
            return {
                //
            }
        },
        computed: {
            progressWidth: function() {
                return (this.informations.currentStage / this.informations.allStages) * 100;
            }
        },
    }
</script>
