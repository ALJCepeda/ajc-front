import {Action} from "@/types";

export default function generateActions<IStoreState>(module:any, actions:{ [key:string]:Action<IStoreState, any, any, any> }) {
  const moduleActions = {};

  for(const key in actions) {
    const info = actions[key];
    moduleActions[info.task] = info.handler;
    info.type = `${module.namespace}/${info.task}`;
  }

  module.actions = {
    ...module.actions,
    ...moduleActions
  };

  return module;
}
