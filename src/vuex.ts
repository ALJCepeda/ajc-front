import Vue from "vue";
import Vuex from "vuex";

import blog from "@/modules/blog/store/index.js";
import timeline from "@/modules/timeline/store/index.ts";

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: { blog, timeline }
});

export default store;
