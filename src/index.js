// let tabs = require('./scripts/tabs');
// let router = require('./scripts/router');
import $ from 'jquery';
import Vue from 'vue';

import './less/flex.less';
import './less/variables.less';
import './less/index.less';

import router from './services/router.js';
import app from './app.vue';

Vue.config.debug = true;

/* eslint-disable no-new */
new Vue({
  el: '#app',
  render: h => h(app, { }),
  template: `<app></app>`,
  components: { app },
  router
});

/* Home script */
//$('.home-carousel').slick();
