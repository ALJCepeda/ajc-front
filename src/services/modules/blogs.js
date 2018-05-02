import Vue from 'vue';
import toolbelt from 'aj-toolbelt';

import api from './../api';

const module = {
  namespaced:true,
  state: {
    manifest: null,
    defaults: null,
    entries: {},
    content: {}
  },
  getters: {
    manifest(state) {
      return state.manifest;
    },
    entries(state) {
      return (offset, limit) => {
        const result = [];

        for(let i = offset; i<limit; i++) {
          if(_.isObject(state.entries[i])){
            result.push(state.entries[i]);
          }
        }

        return result;
      };
    },
    entriesByPage(state, getters) {
      return (page) => {
        const limit = state.defaults.entries.limit;
        const offset = page * limit;

        debugger;
        return getters.entries(offset, limit);
      };
    },
    entry(state) {
      return (id) => {
        return state.entries[id];
      };
    },
    content(state) {
      return (id) => {
        debugger;
        return state.content[id];
      };
    }
  },
  mutations: {
    manifest(state, manifest) {
      Vue.set(state, 'manifest', manifest);
      Vue.set(state, 'defaults', manifest.defaults);
    },
    entries(state, entries) {
      const mapped = _.mapValues(entries, (entry) => {
        entry.fromNow = moment().calendar(entry.created_at);
        return entry;
      });

      const merged = _.merge(state.entries, mapped);
      Vue.set(state.entries, merged);
    },
    entry(state, entry) {
      Vue.set(state.entries, entry.id, entry);
    },
    content(state, blob) {
      Vue.set(state.content, blob.id, blob.content);
    }
  },
  actions: {
    manifest({ commit, state }) {
      const manifest = state.manifest;

      if(_.isObject(manifest)) {
        return Promise.resolve(manifest);
      } else {
        return api.get('blogs/manifest').then((resp) => {
          commit('manifest', resp.data);
          return resp;
        });
      }
    },
    entries({ commit, state, getters }, { limit, offset } = {}) {
      if(_.isUndefined(limit)) { limit = state.manifest.defaults.entries.limit; }
      if(_.isUndefined(offset)) { offset = state.manifest.defaults.entries.offset; }

      const start = offset;
      let end = limit + offset;

      if(end > state.manifest.count) {
        end = state.manifest.count;
      }

      const entries = getters.entries(start, end);
      const indexes = toolbelt.findMissingIndexes(entries, start, end);

      if(indexes.length === 0) {
        return Promise.resolve(entries);
      } else {
        return api.get('/blogs/entries', { params:indexes }).then((resp) => {
          commit('entries', resp.data);
          return resp;
        });
      }
    }, entriesByPage({ commit, state, dispatch }, page = 0) {
      const limit = state.defaults.entries.limit;
      const offset = page * limit;

      return dispatch('entries', { limit, offset });
    }, entry({ commit, state, getters }, id) {
      const entry = getters.entry(id);

      if(_.isObject(entry)) {
        return Promise.resolve(entry);
      } else {
        return api.get(`/blog/entry/${id}`).then((resp) => {
          commit('entry', resp.data);
          return resp;
        });
      }
    }, content({ commit, getters }, id) {
      const content = getters.content(id);

      if(_.isObject(content)) {
        return Promise.resolve(content);
      } else {
        return api.get(`/blogs/${id}`).then((resp) => {
          commit('content', { id, content:resp.data });
          return resp;
        });
      }
    }
  }
};

export default module;
