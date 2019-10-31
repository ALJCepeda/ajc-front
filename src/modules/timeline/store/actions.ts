import TimelineEntry from "ajc-shared/src/models/TimelineEntry"
import createAction from "@/services/functions/createAction";
import {
  Action,
  CreateModuleActionOptions,
  GenericActionHandlerError,
  PaginationContext,
  TimelineModuleState
} from "@/types";
import {timelineAPI} from "@/modules/timeline/store/api";

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

export const TimelineActions = {
  LOAD: createTimelineAction<PaginationContext, TimelineEntry[]>({
    task:'Fetch a page of TimelineEntries',
    async handler(context, action) {
      return timelineAPI.get(action.payload);
    }
  }),
  UPSERT: createTimelineAction<TimelineEntry>({
    task:'Insert or Update TimelineEntry',
    async handler(context, action) {
      return timelineAPI.post(action.payload);
    }
  })
};
