import TimelineEntry from "ajc-shared/src/models/TimelineEntry"
import createAction from "@/services/functions/createAction";
import {Action, CreateModuleActionOptions, GenericActionHandlerError, TimelineModuleState} from "@/types";

function createTimelineAction <
  IPayloadType,
  IHandlerResponse = IPayloadType,
  IHandlerError = GenericActionHandlerError
  > (
  options:CreateModuleActionOptions<TimelineModuleState, IPayloadType, IHandlerResponse, IHandlerError>
) :
  Action<TimelineModuleState, IPayloadType, IHandlerResponse, IHandlerError>
{
  return createAction<TimelineModuleState, IPayloadType, IHandlerResponse, IHandlerError>({
    type:'TBD',
    ...options
  });
}

export default {
  UPSERT: createTimelineAction<TimelineEntry>({
    task:'Insert or Update TimelineEntry',
    async handler(context, payload) {
      return payload
    }
  })
};
