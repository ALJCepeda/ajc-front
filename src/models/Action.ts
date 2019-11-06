import {ActionPayload, PartialBy} from "@/types";
import {ActionContext} from "vuex";

export type CreateActionOptions <
  IStoreState,
  IPayloadType,
  IHandlerResponse
> = PartialBy<Action<IStoreState, IPayloadType, IHandlerResponse>, 'create' | 'with'>;

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
  type: string;
  data?: IPayloadType;

  constructor(options: CreateActionOptions<IStoreState, IPayloadType, IHandlerResponse>) {
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
