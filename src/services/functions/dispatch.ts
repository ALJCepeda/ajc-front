import {Store} from "vuex";
import {Action} from "@/models/Action";

export function $dispatch <
  IStoreState,
  IPayloadAction,
  IHandlerResponse = IPayloadAction
> (
  $store:Store<IStoreState>,
  action:Action<IStoreState, IPayloadAction, IHandlerResponse>
) :
  (data:IPayloadAction) => Promise<IHandlerResponse>
{
  return (payload:IPayloadAction) => {
    return action.create(payload).then((payload) =>  {
      return $store.dispatch(payload);
    });
  };
}

export function $dispatchNow <
  IStoreState,
  IPayloadAction,
  IHandlerResponse = IPayloadAction
  > (
  $store:Store<IStoreState>,
  action:Action<IStoreState, IPayloadAction, IHandlerResponse>,
  payload:IPayloadAction
) :
  Promise<IHandlerResponse>
{
  return $dispatch($store, action)(payload);
}
