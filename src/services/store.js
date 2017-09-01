import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

export const state = {
  general: {}
};

export const mutations = {
  general (state, data) {
      Object.entries(data).forEach(([key, value]) => state.general[key] = value);
  }
};

/* Checks state and returns <key, values> it doesn't haven't */
export const getNeedsFetch = function(state, data) {
  const result = {};

  for (let [coll, keys] of Object.entries(data)) {
    if(_.isNil(state[coll])) {
      result[coll] = keys;
    } else {
      keys.forEach((key) => {
        if(_.isNil(state[coll][key])) {
          if(_.isUndefined(result[coll])) {
            result[coll] = [];
          }

          result[coll].push(key);
        }
      });
    }
  }

  return result;
};

export const actions = {
  fetch (state, data) {
    const needsFetch = getNeedsFetch(state, data);
  }
}

export default new Vuex.Store({
  state,
  mutations
});
