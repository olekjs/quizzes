<template>
    <div>
        <div class="card shadow mb-3">
            <div class="card-body mb-4">
                <h4>Ustawienia</h4>
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" v-model="title" class="form-control" placeholder="Tytuł">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" v-model="category">
                            <option v-for="category in categories" :value="category.id">
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" v-model="password" class="form-control" placeholder="Hasło">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success btn-block">Zapisz</button>
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
                title: '',
                category: '',
                password: '',
            }
        },
        methods: {
           //
        },
    }
</script>
