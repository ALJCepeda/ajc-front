import Vue from "vue";
import Vuex from "vuex";

import blogs from "@/modules/blog/BlogStore";
import timeline from "@/modules/timeline/TimelineStore";

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: { blogs, [timeline.namespace]:timeline }
});

export default store;
