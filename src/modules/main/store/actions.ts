import {APIAction} from "@/models/Action";
import {appAPI} from "@/modules/main/store/api";

class AppAction <
  IAPI extends IEndpoint<IAPI['IRequest'], IAPI['IResponse']>
> extends APIAction<AppState, IAPI> {
  module: ''
}

export const AppActions = {
  LOGIN: new AppAction<ILogin>('Login User', async (context, action) => {
    return appAPI.login(action.payload).then(() => {
      context.commit('setAuthenticated', true);
      return true;
    }).catch((err) => {
      context.commit('setAuthenticated', false);
      throw err;
    });
  })
}