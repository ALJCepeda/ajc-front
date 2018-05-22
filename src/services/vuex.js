import Vue from 'vue';
import Vuex from 'vuex';

import blogs from './modules/blogs';
import timeline from './modules/timeline';

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: { blogs, timeline }
});

export default store;
