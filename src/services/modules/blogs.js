import Vue from 'vue';
import toolbelt from 'ajc-toolbelt/js';

import api from './../api';

const module = {
  namespaced:true,
  state: {
    manifest: null,
    entries: {},
    blogs: {}
  },
  getters: {
    manifest(state) {
      return state.manifest;
    },
    entry(state) {
      return (id) => {
        return state.entries.get(id);
      };
    },
    blog(state) {
      return (id) => {
        return state.blogs.get(id);
      };
    }
  },
  mutations: {
    manifest(state, manifest) {
      Vue.set(state, 'manifest', manifest);
    },
    entry(state, entry) {
      entry.fromNow = moment().calendar(entry.created_at);
      debugger;
      entry.imageUrl = `${process.env.STATIC_URL}/images/${entry.image}`;
      Vue.set(state.entries, entry.id, entry);
    },
    blog(state, { id, blog }) {
      Vue.set(state.blog, id, blog);
    }
  },
  actions: {
    manifest({ commit }) {
      return api.get('/blogs/manifest').then(resp => {
        commit('manifest', resp);
        return resp;
      });
    },
    entries({ commit }, ids = []) {
      return api.post('/blogs/entries', ids).then(entries => {
        entries.forEach(entry => commit('entry', entry));
        return entries;
      });
    },
    entriesByPage({ commit, dispatch }, page) {
      return api.get('/blogs/entriesByPage', { page, limit:20 }).then(ids => {
        return dispatch('entries', ids);
      });
    },
    content({ commit }, id) {
      return api.get(`/blogs/${id}`).then(resp => {
        commit('blog', { id, blog:resp });
        return resp;
      });
    }
  }
};

export default module;
