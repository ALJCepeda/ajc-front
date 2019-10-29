import {Store} from "vuex";
import {Action} from "@/types";

export default function $dispatch <
  IStoreState,
  IPayloadAction,
  IHandlerResponse,
  IHandlerError
> (
  $store:Store<IStoreState>,
  action:Action<IStoreState, IPayloadAction, IHandlerResponse, IHandlerError>
) :
  (data:IPayloadAction) => Promise<{ resolved?:IHandlerResponse, rejected?:IHandlerError }>
{
  return (payload:IPayloadAction) => {
    return action.create(payload).then((payload) =>  {
      return $store.dispatch(payload).then(resp => ({ resolved:resp }), err => ({ rejected:err }));
    });
  };
}
