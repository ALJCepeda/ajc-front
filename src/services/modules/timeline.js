import api from './../api';
import util from './../util';

const module = {
  namespaced:true,
  state: {
    manifest: null,
    entries: []
  },
  getters: {
    manifest: (state) => {
      return state.manifest;
    },
    entries: (state) => (limit, offset) => {
      return state.entries.slice(offset, offset + limit);
    }
  },
  mutations: {
    manifest: function(state, manifest) {
      state.manifest = manifest;
    },
    entries: function(state, entries) {
      state.entries = _.merge(state.entries, entries);
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
    indexes ({ commit, state }, { limit = 10, offset = 0 } = {}) {
      const start = offset;
      let end = limit + offset;

      if(end > state.manifest.count) {
        end = state.manifest.count;
      }

      const entries = state.entries.slice(offset, offset + limit);
      const indexes = util.findMissingIndexes(entries, start, end);

      if(indexes.length === 0) {
        return Promise.resolve(entries);
      } else {
        return api.get('/timeline/indexes', { params:indexes }).then((resp) => {
          commit('entries', resp.data);
          return resp;
        });
      }
    }
  }
};

export default module;
