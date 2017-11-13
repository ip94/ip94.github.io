import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './App.vue'
import Data from './components/Data.vue'

const routes = [
  { path: '/data/:type', component: Data }
]

const router = new VueRouter({
  routes
})

// var App = Vue.extend({});

// var router = new VueRouter();

// router.start(App, '#app');

new Vue({
  el: '#app',
  router,
  render: h => h(App)
})