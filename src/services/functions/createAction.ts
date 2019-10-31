import {Action, ActionPayload, CreateActionOptions} from "@/types";

export default function createAction <
  IStoreState,
  IPayloadType,
  IHandlerResponse
> (
  options:CreateActionOptions<IStoreState, IPayloadType, IHandlerResponse>
) :
  Action<IStoreState, IPayloadType, IHandlerResponse>
{
  const ActionOptions = {
    async create(payload:IPayloadType):Promise<ActionPayload<IPayloadType>> {
      return {
        type:ActionOptions.type,
        payload:payload
      };
    },
    ...options
  };

  return ActionOptions;
}
