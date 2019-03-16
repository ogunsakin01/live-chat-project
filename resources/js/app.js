/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import Vue from 'vue'
import moment from 'moment'
import VueChatScroll from 'vue-chat-scroll'
import VueResource from 'vue-resource'

Vue.prototype.moment = moment
Vue.use(VueChatScroll)
Vue.use(VueResource)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

import MainComponent from './components/MainComponent.vue';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
      users : []
    },
    created(){
        Echo.join('online')
            .here((users)=>{this.users = users})
            .joining((user) => this.users.push(user))
            .leaving((user) => this.users.filter(u => u,id !== user.id))
    },
    components: {
        MainComponent
    },



});
