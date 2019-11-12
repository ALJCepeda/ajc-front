import {ActionContext} from "vuex";

export type CreateActionOptions <
  IStoreState,
  IPayloadType,
  IHandlerResponse
> = Omit<PartialBy<Action<IStoreState, IPayloadType, IHandlerResponse>, 'create' | 'with'>, 'type'>;

export type CreateModuleActionOptions<IStoreState, IPayloadType, IHandlerResponse> = {
  task:string;
  handler(context:ActionContext<IStoreState, IStoreState>, payload:ActionPayload<IPayloadType>):Promise<IHandlerResponse>;
  create?:(payload:IPayloadType) => Promise<ActionPayload<IPayloadType>>
}

export class Action<
  IStoreState,
  IPayloadType,
  IHandlerResponse
> {
  task: string;
  data?: IPayloadType;

  get type():string {
    return `${this.module}/${this.task}`;
  }

  constructor(private module:string, options: CreateActionOptions<IStoreState, IPayloadType, IHandlerResponse>) {
    Object.assign(this, options);
  }

  handler?(context: ActionContext<IStoreState, IStoreState>, payload: ActionPayload<IPayloadType>): Promise<IHandlerResponse>;

  async create(payload:IPayloadType):Promise<ActionPayload<IPayloadType>> {
    return {
      type:this.type,
      payload:payload
    };
  }

  with(data:IPayloadType):this {
    this.data = data;
    return this;
  }
}

export class APIAction<
  IStoreState,
  IAPI extends IEndpoint<IAPI['IRequest'], IAPI['IResponse']>,
  IHandlerResponse = IAPI['IResponse']
>
  extends Action<IStoreState, IAPI['IRequest'], IHandlerResponse>
{

}
