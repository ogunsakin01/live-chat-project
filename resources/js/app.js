/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import moment from 'moment'

Vue.prototype.moment = moment
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

import ChatForm from './components/ChatForm.vue';
import ChatMessages from './components/ChatMessages.vue';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    components: {
        ChatForm, ChatMessages
    },

    data: {
        messages: [],
        typing_message : {
            user : '',
            status : 0,
            message : ''
        }
    },

    created() {
        this.fetchMessages();
        Echo.private('chat')
            .listen('MessageSent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            })
            .listenForWhisper('typing',(e) => {
                this.typing_message.user = e.status.user
                this.typing_message.status = e.status.status
                this.typing_message.message = e.status.message
            })
    },

    methods: {
        fetchMessages() {
            axios.get('/messages')
                .then((response) => {
                    this.messages = response.data;
                })
        },

        addMessage(message) {
            this.messages.push(message)
            axios.post('/messages', message)
                .then((response) => {

                })
        },

        typing(status){
            Echo.private('chat')
                .whisper('typing',{
                    status : status
                });
        },
    },

});
