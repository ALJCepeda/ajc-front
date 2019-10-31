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
    with(data:IPayloadType):Action<IStoreState, IPayloadType, IHandlerResponse> {
      this.data = data;
      return this;
    },
    ...options
  };

  return ActionOptions;
}
