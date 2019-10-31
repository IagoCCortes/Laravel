require('./bootstrap');

window.Vue = require('vue');

Vue.component('follow-button', require('./components/FollowButton.vue').default);
Vue.component('like-button', require('./components/LikeButton.vue').default);

const app = new Vue({
    el: '#app',
});