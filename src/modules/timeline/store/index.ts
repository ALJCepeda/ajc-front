import { TimelineActions } from "@/modules/timeline/store/actions";
import generateActions from "@/services/functions/generateActions";
import {RootState, StoreModule, TimelineModuleState} from "@/types";

const module:StoreModule<TimelineModuleState, RootState> = {
  namespace: 'timeline',
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
