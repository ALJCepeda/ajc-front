import { Action } from "@/models/Action";
import {ILazyDictionary} from "@/models/LazyDictionary";

export default function generateActions<T>(
  module: any,
  actions: ILazyDictionary<T>
) {
  const moduleActions = {};

  actions.keys.forEach((key) => {
    const action = actions[key] as Action<any, any, any>;
    moduleActions[action.task] = action.handler;
  });

  module.actions = {
    ...module.actions,
    ...moduleActions
  };

  return module;
}
