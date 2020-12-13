import { ActionContext, Store } from "vuex";

export abstract class Action<
  IStoreState,
  IPayloadType,
  IResponseType,
  IRootState = AppState
> {
  public payload?: IPayloadType;
  public module = "";
  abstract task: string;
  abstract handler(
    context: ActionContext<IStoreState, IRootState>,
    action: ActionPayload<IPayloadType>
  ): Promise<IResponseType>;

  get type(): string {
    if (!this.module) {
      return this.task;
    }

    return `${this.module}/${this.task}`;
  }

  async transform(payload: IPayloadType): Promise<ActionPayload<IPayloadType>> {
    return {
      type: this.type,
      payload: payload
    };
  }

  with(payload: IPayloadType): this {
    this.payload = payload;
    return this;
  }

  private doneResolve: (value: IResponseType) => void;
  private doneReject: (err: any) => void;
  done(cb: (deferred: Promise<IResponseType>) => void): this {
    cb(
      new Promise((resolve, reject) => {
        this.doneResolve = resolve;
        this.doneReject = reject;
      })
    );

    return this;
  }

  createDispatcher(
    $store: Store<IStoreState>
  ): (payload: IPayloadType) => Promise<IResponseType> {
    return (payload: IPayloadType) => {
      return this.transform(payload)
        .then(storeAction => {
          debugger
          return $store.dispatch(storeAction);
        })
        .then(result => {
          if (this.doneResolve) {
            this.doneResolve(result);
          }
          return result;
        })
        .catch(err => {
          if (this.doneReject) {
            this.doneReject(err);
          }
          throw err;
        });
    };
  }

  $dispatch(
    $store: Store<IStoreState>,
    payload: IPayloadType
  ): Promise<IResponseType> {
    return this.createDispatcher($store)(payload);
  }
}

export abstract class APIAction<
  IStoreState,
  IAPI extends IEndpoint<IAPI["IRequest"], IAPI["IResponse"]>,
  IRootState
> extends Action<
  IStoreState,
  IAPI["IRequest"],
  IAPI["IResponse"],
  IRootState
> {}
