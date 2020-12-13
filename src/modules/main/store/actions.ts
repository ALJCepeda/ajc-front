import { APIAction } from "../../../models/Action";
import { AppAPI } from "./api";
import { ActionContext } from "vuex";
import { lazyActionDictionaryFrom } from "@/models/LazyDictionary";

abstract class AppAction<
  IAPI extends IEndpoint<IAPI["IRequest"], IAPI["IResponse"]>
> extends APIAction<AppState, IAPI, AppState> {
  module: "";
}

class Login extends AppAction<ILogin> {
  task = "Login User";
  handler(
    context: ActionContext<AppState, AppState>,
    action: ActionPayload<ILogin["IRequest"]>
  ): Promise<ILogin["IResponse"]> {
    return AppAPI.login(action.payload)
      .then(() => {
        context.commit("setAuthenticated", true);
        return true;
      })
      .catch(err => {
        context.commit("setAuthenticated", false);
        throw err;
      });
  }
}

class FetchAppState extends AppAction<IFetchAppState> {
  task = "Update App State";
  handler(
    context: ActionContext<AppState, AppState>
  ): Promise<IFetchAppState["IResponse"]> {
    return AppAPI.fetchAppState(null).then((resp) => {
      context.commit("setAppState", resp);
      return resp;
    }, (err) => {
      context.commit("setAppState", { isAuthenticated: false });
      return { isAuthenticated: false };
    });
  }
}

export const AppActions = lazyActionDictionaryFrom({
  LOGIN: Login,
  FETCHAPPSTATE: FetchAppState
});
