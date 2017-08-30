import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

export const state = {
  general: {}
};

export const mutations = {
  general (state, data) {
      Object.entries(obj).forEach(([key, value]) => state.general[key] = value);
  }
};

export default new Vuex.Store({
  state,
  mutations
});
