const store = new Vuex.Store({
  state: {
    general: {}
  },
  mutations: {
    general (state, data) {
        Object.entries(obj).forEach(([key, value]) => state.general[key] = value);
    }
  }
})
