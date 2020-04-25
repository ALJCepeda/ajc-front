type PartialBy<T, K extends keyof T> = Omit<T, K> & Partial<Pick<T, K>>

interface ActionPayload<T> {
  type:string;
  payload:T;
}

interface TimelineModuleState {
  manifest:any,
  entries:{ [key:string]:any }
}

interface AppState {
  authenticated:boolean;
}

type Callback<T> = (err:Error | null, resp?:T) => void;