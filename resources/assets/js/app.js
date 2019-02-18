
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat-app', require('./components/ChatApp.vue'));
Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));

const app = new Vue({
    el: '#app',

    data: {
        admin_messages: []
    },

    created() {
        this.fetchMessages();
        Echo.private('chat')
  .listen('MessageSent', (e) => {
    this.admin_messages.push({
      message: e.message.message,
      user: e.user
    });
  });
    },

    methods: {
        fetchMessages() {
            axios.get('/adminpanel/messages').then(response => {
                this.admin_messages = response.data;
            });
        },

        addMessage(message) {
            this.admin_messages.push(message);

            axios.post('/adminpanel/messages', message).then(response => {
              console.log(response.data);
            });
        }
    }
});