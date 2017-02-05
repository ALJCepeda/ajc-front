// let tabs = require('./scripts/tabs');
// let router = require('./scripts/router');
import $ from 'jquery';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import 'slick-carousel/slick/slick.js';
import './less/flex.less';
import './less/variables.less';
import './less/index.less';
import Vue from 'vue';
import app from './app';

/* eslint-disable no-new */
new Vue({
  el: '#app',
  render: h => h(app),
  template: '<app/>',
  components: { app }
});

/* Home script */
$('.home-carousel').slick();
