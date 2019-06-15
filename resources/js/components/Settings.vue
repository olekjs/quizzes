<template>
    <div class="row">
        <div class="col-md-8">
            <input type="text" class="form-control" placeholder="Wpisz Twój nick" v-model="nickname">
        </div>
        <div class="col-md-4">
            <button class="btn btn-success btn-block" v-on:click="startGame">Zacznij grę</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            gameId: '',
        },
        data: function() {
            return {
                nickname: '',
            }
        },
        methods: {
            startGame: function() {
                if (!this.validateNickname()) {
                    return;
                }

                this.savePlayer();
            },
            validateNickname: function() {
                let nickname = this.nickname;

                if (!nickname) {
                    this.alert('error', 'Nick gracza jest wymagany');
                }

                if (nickname.length > 10) {
                    this.alert('error', 'Nick gracza nie może być dłuższy niż 10 znaków');
                }

                if (nickname.length <= 2) {
                    this.alert('error', 'Nick gracza nie może być krótszy niż 2 znaki');
                }

                if (nickname && nickname.length < 8 && nickname.length > 2) {
                    return true;
                }
            },
             savePlayer: function() {
                axios.put('/api/save/player', {
                    game_id: this.gameId,
                    nickname: this.nickname,
                }).then((response) => {
                    this.$emit('startGame', this.nickname, response.data);
                }).catch(() => {
                    this.alert('error', 'Wystąpił błąd z połączeniem. Spróbuj ponownie.');
                });
            },
            alert: function(type, text) {
                this.$notify({
                    group: 'alert',
                    type: type,
                    text: text,
                });
            }
        },
    }
</script>
