import {Store} from "vuex";
import {Action} from "@/types";

export default function $dispatch <
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
