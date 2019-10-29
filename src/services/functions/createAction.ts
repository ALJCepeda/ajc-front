import {Action, ActionPayload, CreateActionOptions} from "@/types";

export default function createAction <
  IStoreState,
  IPayloadType,
  IHandlerResponse,
  IHandlerError
> (
  options:CreateActionOptions<IStoreState, IPayloadType, IHandlerResponse, IHandlerError>
) :
  Action<IStoreState, IPayloadType, IHandlerResponse, IHandlerError>
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
