import {Action, APIAction, CreateModuleActionOptions} from "@/models/Action";
import {appAPI} from "@/modules/main/store/api";

function mainAction <
  IPayloadType,
  IHandlerResponse
  > (
  options:CreateModuleActionOptions<AppState, IPayloadType, IHandlerResponse>
) :
  Action<AppState, IPayloadType, IHandlerResponse>
{
  return new Action<AppState, IPayloadType, IHandlerResponse>('', options);
}

function createMainAPIAction <
  IAPI extends IEndpoint<IAPI['IRequest'], IAPI['IResponse']>,
  IHandlerResponse = IAPI['IResponse']
  > (
  options:CreateModuleActionOptions<AppState, IAPI['IRequest'], IHandlerResponse>
) :
  APIAction<AppState, IAPI, IHandlerResponse>
{
  return new APIAction<AppState, IAPI, IHandlerResponse>('', options);
}

export const MainActions = {
  LOGIN: createMainAPIAction<Login>({
    task:'Login User',
    async handler(context, action) {
      return appAPI.login(action.payload).then((result) => {
        debugger;
        context.commit('setAuthenticated', true);
        return true;
      }).catch((err) => {
        console.error(err);
        context.commit('setAuthenticated', false);
        return false;
      });
    }
  })
};
