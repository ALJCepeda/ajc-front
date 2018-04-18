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
    entries: (state) => (size, offset) => {
      return state.entries.slice(offset, offset + size);
    }
  },
  mutations: {
    manifest: function(state, data) {
      state.manifest = data;
    },
    entries: function(state, data) {
      state.entries = _.merge(state.entries, data);
    }
  },
  actions: {
  }
};

export default module;
