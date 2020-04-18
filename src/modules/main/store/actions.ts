import {Action, APIAction, CreateModuleActionOptions} from "@/models/Action";
import {appAPI} from "@/modules/main/store/api";

function appAction <
  IPayloadType,
  IHandlerResponse
  > (
  options:CreateModuleActionOptions<AppState, IPayloadType, IHandlerResponse>
) :
  Action<AppState, IPayloadType, IHandlerResponse>
{
  return new Action<AppState, IPayloadType, IHandlerResponse>('timeline', options);
}

function appAPIAction <
  IAPI extends IEndpoint<IAPI['IRequest'], IAPI['IResponse']>,
  IHandlerResponse = IAPI['IResponse']
  > (
  options:CreateModuleActionOptions<TimelineModuleState, IAPI['IRequest'], IHandlerResponse>
) :
  APIAction<TimelineModuleState, IAPI, IHandlerResponse>
{
  return new APIAction<TimelineModuleState, IAPI, IHandlerResponse>('timeline', options);
}

export const AppActions = {
  LOGIN: appAPIAction<Login>({
    task:'Login User',
    async handler(context, action) {
      return appAPI.login(action.payload);
    }
  })
};
