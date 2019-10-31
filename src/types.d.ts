import {ActionContext, Module} from "vuex";

type PartialBy<T, K extends keyof T> = Omit<T, K> & Partial<Pick<T, K>>

interface ActionPayload<T> {
  type:string;
  payload:T;
}

interface Action<IStoreState, IPayloadType, IHandlerResponse, IHandlerError> {
  task:string;
  type:string;
  handler(context:ActionContext<IStoreState, IStoreState>, payload:ActionPayload<IPayloadType>):Promise<IHandlerResponse | IHandlerError>;
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
  handler(context:ActionContext<IStoreState, IStoreState>, payload:ActionPayload<IPayloadType>):Promise<IHandlerResponse | IHandlerError>;
  create?:(payload:IPayloadType) => Promise<ActionPayload<IPayloadType>>
}

interface TimelineModuleState {
  manifest:any,
  entries:{ [key:string]:any }
}

interface RootState {

}

interface GenericActionHandlerError {
  type:string;
  error:Error
}

interface APIError {
  status:number;

}

interface StoreModule<S, R> extends Module<S, R> {
  namespace:string;
}

interface PaginationContext {
  page:number;
  limit:number;
}
