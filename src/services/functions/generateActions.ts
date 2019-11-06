import {Action} from "@/models/Action";

export default function generateActions<IStoreState>(module:any, actions:{ [key:string]:Action<IStoreState, any, any> }) {
  const moduleActions = {};

  for(const key in actions) {
    const info = actions[key];
    moduleActions[info.task] = info.handler;
  }

  module.actions = {
    ...module.actions,
    ...moduleActions
  };

  return module;
}
