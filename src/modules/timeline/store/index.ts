import { TimelineActions } from "@/modules/timeline/store/actions";
import generateActions from "@/services/functions/generateActions";
import {RootState, TimelineModuleState} from "@/types";
import {Module} from "vuex";

const module:Module<TimelineModuleState, RootState> = {
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

  },
  actions: {

  }
};


generateActions(module, TimelineActions);

export default module;
