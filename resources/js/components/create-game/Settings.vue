<template>
    <div>
        <div class="card shadow mb-3">
            <div class="card-body mb-4">
                <h4>Ustawienia</h4>
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" v-model="settings.title" class="form-control" placeholder="Tytuł">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" v-model="settings.category">
                            <option v-for="category in categories" :value="category.id">
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" v-model="settings.password" class="form-control" placeholder="Hasło">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success btn-block"  data-toggle="modal" data-target="#confirm">Zapisz</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="confirmLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmLabel">Zapis gry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        Czy na pewno chcesz zapisać utworzoną grę?
                    </div>
                    <div class="modal-footer">
                        <div class="container-fluid row">
                            <div class="col-md-6 text-left">
                                <button class="btn btn-default" data-dismiss="modal">Wróć do edytora</button>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-success btn-block" v-on:click="saveGame">Zapisz</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            categories: {
                required: true,
                type: Array,
            },
        },
        data: function() {
            return {
                settings: {
                    title: '',
                    category: '',
                    password: '',
                }
            }
        },
        methods: {
            saveGame: function() {
                this.$emit('saveGame', this.settings);
            }
        },
    }
</script>
