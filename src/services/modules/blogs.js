import Vue from 'vue';
import api from './../api';

const module = {
  namespaced:true,
  state: {
    manifest: null,
    entries: []
  },
  getters: {
    manifest: (state) => () => {
      return state.manifest;
    },
    id: (state) => (id) => {
      return state.entries[id];
    }
  },
  mutations: {
    manifest: function(state, data) {
      state.manifest = data;
    },
    entries: function(state, data) {
      state.entries = _.merge(state.entries, data);
    },
    addBlog: function(state, data) {
      Vue.set(state.entries, data.id, data.blog);
    }
  },
  actions: {
    fetchList ({ commit, state }) {
      if(_.isObject(state.manifest)) {
        return Promise.resolve(state.manifest);
      } else {
        api.get('/blog/manifest').then((resp) => {
            commit('manifest', resp.data);
            return resp;
        });
      }
    },
    fetch({ commit, state }, id) {
      if(_.isObject(state.entries[id])) {
        return Promise.resolve(state.entries[id]);
      } else {
        api.get(`/blog/${id}`).then((resp) => {
          const blog = resp.data;
          commit('addBlog', { id, blog });
          return resp;
        });
      }
    }
  }
};

export default module;
