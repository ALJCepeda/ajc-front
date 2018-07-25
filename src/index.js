// let tabs = require('./scripts/tabs');
// let router = require('./scripts/router');
import $ from 'jquery';
import Vue from 'vue';

import './less/variables.less';
import './less/index.less';

import store from './services/vuex.js';
import data from './services/data';
import router from './services/router.js';
import app from './app.vue';

Vue.config.debug = true;

/* eslint-disable no-new */

Promise.all([
  //store.dispatch('blogs/manifest'),
  //store.dispatch('timeline/manifest')
]).then(() => {
  new Vue({
    el: '#app',
    render: h => h(app, { }),
    template: `<app></app>`,
    components: { app },
    data: function() {
      return { data };
    },
    router, store
  });
});

/* Home script */
//$('.home-carousel').slick();
