import {ActionContext} from "vuex";

type PartialBy<T, K extends keyof T> = Omit<T, K> & Partial<Pick<T, K>>

interface ActionPayload<T> {
  type:string;
  payload:T;
}

interface Action<IStoreState, IPayloadType, IHandlerResponse, IHandlerError> {
  task:string;
  type:string;
  handler(context:ActionContext<IStoreState, IStoreState>, payload:IPayloadType):Promise<IHandlerResponse | IHandlerError>;
  create(payload:IPayloadType):Promise<ActionPayload<IPayloadType>>;
}

type CreateActionOptions <
  IStoreState,
  IPayloadType,
  IHandlerResponse,
  IHandlerError
> =
  PartialBy<Action<IStoreState, IPayloadType, IHandlerResponse, IHandlerError>, 'create'>;

type CreateModuleActionOptions<IStoreState, IPayloadType, IHandlerResponse, IHandlerError> = {
  task:string;
  handler(context:ActionContext<IStoreState, IStoreState>, payload:IPayloadType):Promise<IHandlerResponse | IHandlerError>;
  create?:(payload:IPayloadType) => Promise<ActionPayload<IPayloadType>>
}

interface TimelineModuleState {
  manifest:any,
  entries:{ [key:string]:any }
}

interface GenericActionHandlerError {
  type:string;
  error:Error
}

interface APIError {
  status:number;

}
