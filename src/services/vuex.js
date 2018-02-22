import Vue from 'vue';
import Vuex from 'Vuex';

Vue.use(Vuex);

const api = axios.create({
  baseURL:process.env.API_URL,
  timeout:1000
});

const store = new Vuex.Store({
  state: {
    manifest: null,
    blogs: {},
  },
  getters: {
    getBlogById: (state) => (id) => {
      return state.blogs[id];
    }
  },
  mutations: {
    manifest: function(state, data) {
      state.manifest = data;
    },
    addBlog: function(state, data) {
      Vue.set(state.blogs, data.id, data.blog);
    }
  },
  actions: {
    fetchBlogs ({ commit, state }) {
      if(_.isObject(state.manifest)) {
        Promise.resolve(state.manifest);
      }

      api.get('/blog/manifest').then((resp) => {
          commit('manifest', resp.data);
          return resp;
      });
    },
    fetchBlog({ commit, state }, id) {
      if(_.isObject(state.blogs[id])) {
        Promise.resolve(state.blogs[id]);
      }

      api.get(`/blog/${id}`).then((resp) => {
        const blog = resp.data;
        commit('addBlog', { id, blog });
        return resp;
      });
    }
  }
});

export default store;
