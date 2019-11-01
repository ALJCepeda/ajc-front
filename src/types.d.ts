import {ActionContext, Module} from "vuex";

type PartialBy<T, K extends keyof T> = Omit<T, K> & Partial<Pick<T, K>>

interface ActionPayload<T> {
  type:string;
  payload:T;
}

interface Action<IStoreState, IPayloadType, IHandlerResponse> {
  task:string;
  type:string;
  data?:IPayloadType;
  handler(context:ActionContext<IStoreState, IStoreState>, payload:ActionPayload<IPayloadType>):Promise<IHandlerResponse>;
  create(payload:IPayloadType):Promise<ActionPayload<IPayloadType>>;
  with(data:IPayloadType):Action<IStoreState, IPayloadType, IHandlerResponse>
}

type CreateActionOptions <
  IStoreState,
  IPayloadType,
  IHandlerResponse
> =
  PartialBy<Action<IStoreState, IPayloadType, IHandlerResponse>, 'create' | 'with'>;

type CreateModuleActionOptions<IStoreState, IPayloadType, IHandlerResponse> = {
  task:string;
  handler(context:ActionContext<IStoreState, IStoreState>, payload:ActionPayload<IPayloadType>):Promise<IHandlerResponse>;
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

interface StoreModule<S, R> extends Module<S, R> {
  namespace:string;
}

interface PaginationContext {
  page:number;
  limit:number;
}

interface IEntity {
  id?:number;
}
