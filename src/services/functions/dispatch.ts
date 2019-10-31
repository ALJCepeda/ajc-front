import {Store} from "vuex";
import {Action, GenericActionHandlerError} from "@/types";

export default function $dispatch <
  IStoreState,
  IPayloadAction,
  IHandlerResponse = IPayloadAction,
  IHandlerError = GenericActionHandlerError
> (
  $store:Store<IStoreState>,
  action:Action<IStoreState, IPayloadAction, IHandlerResponse, IHandlerError>
) :
  (data:IPayloadAction) => Promise<IHandlerResponse>
{
  return (payload:IPayloadAction) => {
    return action.create(payload).then((payload) =>  {
      return $store.dispatch(payload);
    });
  };
}
