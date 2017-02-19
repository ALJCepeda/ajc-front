// let tabs = require('./scripts/tabs');
// let router = require('./scripts/router');
import $ from 'jquery';
import 'material-design-icons/index.js';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import 'slick-carousel/slick/slick.js';
import './less/flex.less';
import './less/variables.less';
import './less/index.less';
import Vue from 'vue';
import VueRouter from 'vue-router';
import app from './app';
import data from './static';

import timeline from './pages/timeline';

Vue.use(VueRouter);
let router = new VueRouter({
  routes: [
    {
      path: '/',
      alias: '/timeline',
      component: timeline,
      props: data
    }
  ]
});

/* eslint-disable no-new */
new Vue({
  el: '#app',
  render: h => h(app, {
    props: data
  }),
  template: `<app></app>`,
  components: { app },
  router
});

/* Home script */
$('.home-carousel').slick();
