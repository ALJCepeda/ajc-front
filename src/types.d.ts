import {ActionContext, Module} from "vuex";

type PartialBy<T, K extends keyof T> = Omit<T, K> & Partial<Pick<T, K>>

interface ActionPayload<T> {
  type:string;
  payload:T;
}

interface TimelineModuleState {
  manifest:any,
  entries:{ [key:string]:any }
}

interface RootState {

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
