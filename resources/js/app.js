
require('./bootstrap');

window.Vue = require('vue');

Vue.component('Game', require('./components/Game.vue').default);

const app = new Vue({
    el: '#app',
});
