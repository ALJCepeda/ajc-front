// let tabs = require('./scripts/tabs');
// let router = require('./scripts/router');
import Vue from 'vue';

import './less/index.less';
import 'bootstrap/dist/css/bootstrap.min.css';

import store from './services/vuex.js';
import data from './services/data';
import router from './services/router.js';
import app from './app.vue';

Vue.config.debug = true;
Vue.config.productionTip = false;

// https://webpack.js.org/guides/dependency-management/#require-context
const requireComponent = require.context(
  // Look for files in the current directory
  './components/global',
  // Do not look in subdirectories
  true,
  // Only include "_base-" prefixed .vue files
  /[\w-]+\.vue$/
);

// For each matching file name...
requireComponent.keys().forEach((fileName) => {
  // Get the component config
  const componentConfig = requireComponent(fileName);
  // Get the PascalCase version of the component name
  const componentName = fileName
  // Remove the "./_" from the beginning
    .replace(/^\.\//, '')
    // Remove the file extension from the end
    .replace(/\.\w+$/, '')
    // Split up kebabs
    .split('-')
    // Upper case
    .map((kebab) => kebab.charAt(0).toUpperCase() + kebab.slice(1))
    // Concatenated
    .join('');

  // Globally register the component
  Vue.component(componentName, componentConfig.default || componentConfig);
});

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
