import Vue from 'vue';
import toolbelt from 'ajc-toolbelt/js';

import api from './../api';

const module = {
  namespaced:true,
  state: {
    defaults: null,
    manifest: null,
    entries: {}
  },
  getters: {
    manifest: (state) => {
      return state.manifest;
    },
    entries: (state) => (offset, limit) => {
      const result = [];

      for(let i = offset; i<limit; i++) {
        if(_.isObject(state.entries[i])){
          result.push(state.entries[i]);
        }
      }

      return result;
    },
    entriesByPage: (state, getters) => (page) => {
      const limit = state.defaults.entries.limit;
      const offset = page * limit;

      return getters.entries(offset, limit);
    }
  },
  mutations: {
    manifest: function(state, manifest) {
      Vue.set(state, 'manifest', manifest);
      Vue.set(state, 'defaults', manifest.defaults);
    },
    entries: function(state, entries) {
      const mapped = _.mapValues(entries, (entry) => {
        entry.fromNow = moment().calendar(entry.created_at);
        return entry;
      });

      const merged = _.merge(state.entries, mapped);
      Vue.set(state.entries, merged);
    }
  },
  actions: {
    manifest ({ commit, state }) {
      const manifest = state.manifest;

      if(_.isObject(manifest)) {
        return Promise.resolve(manifest);
      } else {
        return api.get('timeline/manifest').then((resp) => {
          commit('manifest', resp.data);
          return resp;
        });
      }
    },
    entries ({ commit, state, getters }, { limit, offset } = {}) {
      if(_.isUndefined(limit)) { limit = state.defaults.entries.limit; }
      if(_.isUndefined(offset)) { offset = state.defaults.entries.offset; }

      const start = offset;
      let end = limit + offset;

      if(end > state.manifest.count) {
        end = state.manifest.count;
      }

      const entries = getters.entries(offset, offset + limit);
      const indexes = toolbelt.findMissingIndexes(entries, start, end);

      if(indexes.length === 0) {
        return Promise.resolve(entries);
      } else {
        return api.get('/timeline/entries', { params:indexes }).then((resp) => {
          commit('entries', resp.data);
          return resp;
        });
      }
    },
    entriesByPage({ commit, state, dispatch }, page = 0) {
      const limit = state.defaults.entries.limit;
      const offset = page * limit;

      return dispatch('entries', { limit, offset });
    }
  }
};

export default module;
