import Vue from 'vue';

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
    entry(state, entry) {
      entry.created_at = moment(entry.created_at);
      entry.fromNow = entry.created_at.calendar();
      entry.imageUrl = `${process.env.STATIC_URL}/images/${entry.image}`;
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
      return api.post('/timeline/entries', ids).then(entries => {
        entries.forEach(entry => commit('entry', entry));

        return Array.from(entries.values()).sort((a, b) => {
          return b.created_at.diff(a.created_at);
        });
      });
    },
    entriesByPage({ commit, dispatch }, page) {
      return api.get('/timeline/entriesByPage', { page, limit:20 }).then(ids => {
        return dispatch('entries', ids);
      });
    }
  }
};

export default module;
