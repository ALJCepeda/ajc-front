// let tabs = require('./scripts/tabs');
// let router = require('./scripts/router');
import $ from 'jquery';
import './less/flex.less';
import './less/variables.less';
import './less/index.less';
import Vue from 'vue';
import VueRouter from 'vue-router';
import app from './app.vue';
import api from './api.js';

import timeline from './pages/timeline.vue';
import about from './pages/about.vue';

Vue.config.debug = true;
Vue.use(VueRouter);
let router = new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', redirect: '/timeline' },
    {
      path: '/timeline',
      component: timeline,
      props: api
    },
    { path: '/about', redirect: '/about/overview' },
    {
      path: '/about/:section',
      component: about
    }
  ]
});

/* eslint-disable no-new */
new Vue({
  el: '#app',
  render: h => h(app, {
    props: api
  }),
  template: `<app></app>`,
  components: { app },
  router
});

/* Home script */
$('.home-carousel').slick();
