
require('./bootstrap');

window.Vue = require('vue');
import Notifications from 'vue-notification';

Vue.use(Notifications)
Vue.component('Game', require('./components/Game.vue').default);

const app = new Vue({
    el: '#app',
});
