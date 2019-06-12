<template>
    <div class="col-md-12 mb-2">
        <div class="progress" style="height: 20px;">
            <div class="progress-bar" role="progressbar" v-bind:style="{ width: progressWidth + '%'}" :aria-valuenow="stageInformations.actualStage" :aria-valuemax="stageInformations.allStages" aria-valuemin="0"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            stageInformations: {
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
                return (this.stageInformations.actualStage / this.stageInformations.allStages) * 100;
            }
        },
    }
</script>
