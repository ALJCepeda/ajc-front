import {ActionContext, Store} from "vuex";
import {copyInstance} from "@/services/util";

export abstract class Action<
  IStoreState,
  IPayloadType,
  IResponseType,
  IRootState = AppState
> {
  public payload?: IPayloadType;
  public module:string = ''
  abstract task: string;
  abstract handler(context: ActionContext<IStoreState, IRootState>, action: ActionPayload<IPayloadType>): Promise<IResponseType>;

  get type():string {
    if(!this.module) {
      return this.task;
    }

    return `${this.module}/${this.task}`;
  }

  async transform(payload:IPayloadType):Promise<ActionPayload<IPayloadType>> {
    return {
      type:this.type,
      payload:payload
    };
  }

  doneResolve: (value:IResponseType) => void;
  doneReject: (err:any) => void;
  get done(): Promise<IResponseType> {
    return new Promise((resolve, reject) => {
      this.doneResolve = resolve;
      this.doneReject = reject;
    })
  }

  createDispatcher($store:Store<IStoreState>): (payload:IPayloadType) => Promise<IResponseType> {
    return (payload:IPayloadType) => {
      return this.transform(payload).then((storeAction) =>  {
        return $store.dispatch(storeAction)
      }).then((result) => {
        if(this.doneResolve) {
          this.doneResolve(result)
        }

        return result;
      }).catch((err) => {
        if(this.doneReject) {
          this.doneReject(err)
        }

        throw err
      });
    };
  }

  $dispatch($store:Store<IStoreState>, payload:IPayloadType): Promise<IResponseType> {
    return this.createDispatcher($store)(payload);
  }
}

export abstract class APIAction<IStoreState, IAPI extends IEndpoint<IAPI['IRequest'], IAPI['IResponse']>, IRootState> extends Action<IStoreState, IAPI['IRequest'], IAPI['IResponse'], IRootState> { }