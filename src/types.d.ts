interface ActionPayload<T> {
  type: string;
  payload: T;
}

interface TimelineModuleState {
  manifest: any;
  entries: { [key: string]: any };
}

interface AppState {
  authenticated: boolean;
}
