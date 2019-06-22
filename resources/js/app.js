
require('./bootstrap');

window.Vue = require('vue');
import Notifications from 'vue-notification';

Vue.use(Notifications)
Vue.component('Game', require('./components/game/Game.vue').default);
Vue.component('CreateGame', require('./components/create-game/CreateGame.vue').default);

const app = new Vue({
    el: '#app',
});
