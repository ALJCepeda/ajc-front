import { TimelineActions } from "@/modules/timeline/store/actions";
import generateActions from "@/services/functions/generateActions";
import {Module} from "vuex";

const module:Module<TimelineModuleState, AppState> = {
  namespaced: true,
  state: {
    manifest: null,
    entries: {}
  },
  getters: {
    manifest(state) {
      return state.manifest;
    },
    entry(state) {
      return id => {
        return state.entries.get(id);
      };
    }
  },
  mutations: {

  }
};


generateActions(module, TimelineActions);

export default module;
