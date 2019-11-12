import {timelineAPI} from "@/modules/timeline/store/api";
import {Action, APIAction, CreateModuleActionOptions} from "@/models/Action";
import {TimelinePage, TimelineSave, TimelineRemove} from "ajc-shared/src/timeline.api";

function timelineAction <
  IPayloadType,
  IHandlerResponse
> (
  options:CreateModuleActionOptions<TimelineModuleState, IPayloadType, IHandlerResponse>
) :
  Action<TimelineModuleState, IPayloadType, IHandlerResponse>
{
  return new Action<TimelineModuleState, IPayloadType, IHandlerResponse>('timeline', options);
}

function timelineAPIAction <
  IAPI extends IEndpoint<IAPI['IRequest'], IAPI['IResponse']>,
  IHandlerResponse = IAPI['IResponse']
> (
  options:CreateModuleActionOptions<TimelineModuleState, IAPI['IRequest'], IHandlerResponse>
) :
  APIAction<TimelineModuleState, IAPI, IHandlerResponse>
{
  return new APIAction<TimelineModuleState, IAPI, IHandlerResponse>('timeline', options);
}

export const TimelineActions = {
  LOAD: timelineAPIAction<TimelinePage>({
    task:'Fetch a page of TimelineEntries',
    async handler(context, action) {
      return timelineAPI.getPage(action.payload);
    }
  }),
  UPSERT: timelineAPIAction<TimelineSave>({
    task:'Insert or Update TimelineEntry',
    async handler(context, action) {
      return timelineAPI.save(action.payload);
    }
  }),
  REMOVE: timelineAPIAction<TimelineRemove>({
    task:'Delete a TimelineEntry',
    async handler(context, action) {
      return timelineAPI.remove(action.payload);
    }
  })
};
