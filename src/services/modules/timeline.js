import Vue from 'vue';
import toolbelt from 'ajc-toolbelt/js';

import api from './../api';

const module = {
  namespaced:true,
  state: {
    manifest: null,
    entries: {}
  },
  getters: {
    manifest(state) {
      return state.manifest;
    },
    entry(state) {
      return (id) => {
        return state.entries.get(id);
      };
    }
  },
  mutations: {
    manifest(state, manifest) {
      Vue.set(state, 'manifest', manifest);
    },
    entries(state, entries) {
      entries.forEach((entry, id) => {
        entry.fromNow = moment().calendar(entry.created_at);
        Vue.set(state.entries, id, entry);
      });
    },
    entry(state, entry) {
      Vue.set(state.entries, entry.id, entry);
    }
  },
  actions: {
    manifest({ commit }) {
      return api.get('/timeline/manifest').then(resp => {
        commit('manifest', resp);
        return resp;
      });
    },
    entries({ commit }, ids = []) {
      return api.post('/timeline/entries', { ids }).then(entries => {
        commit('entries', entries);
        return entries;
      });
    },
    entriesByPage({ commit, dispatch }, page) {
      return api.get('/timeline/entriesByPage', { page, limit:20 }).then(ids => {
        debugger;
        return dispatch('entries', ids);
      });
    }
  }
};

export default module;
