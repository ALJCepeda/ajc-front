import Vue from "vue";
import Vuex, {Store} from "vuex";

import main from "./modules/main/store";
import blog from "./modules/blog/store/index.js";
import timeline from "./modules/timeline/store";

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: { main, blog, timeline }
}) as Store<AppState>

export default store;
