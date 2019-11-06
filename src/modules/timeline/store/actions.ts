import TimelineEntry from "ajc-shared/src/models/TimelineEntry"
import {
  PaginationContext,
  TimelineModuleState
} from "@/types";
import {timelineAPI} from "@/modules/timeline/store/api";
import {Action, CreateModuleActionOptions} from "@/models/Action";

function createTimelineAction <
  IPayloadType,
  IHandlerResponse
  > (
  options:CreateModuleActionOptions<TimelineModuleState, IPayloadType, IHandlerResponse>
) :
  Action<TimelineModuleState, IPayloadType, IHandlerResponse>
{
  return new Action<TimelineModuleState, IPayloadType, IHandlerResponse>('timeline', options);
}

export const TimelineActions = {
  LOAD: createTimelineAction<PaginationContext, TimelineEntry[]>({
    task:'Fetch a page of TimelineEntries',
    async handler(context, action) {
      return timelineAPI.get(action.payload);
    }
  }),
  UPSERT: createTimelineAction<TimelineEntry, TimelineEntry>({
    task:'Insert or Update TimelineEntry',
    async handler(context, action) {
      return timelineAPI.post(action.payload);
    }
  }),
  REMOVE: createTimelineAction<number, boolean>({
    task:'Delete a TimelineEntry',
    async handler(context, action) {
      return timelineAPI.remove(action.payload);
    }
  })
};
