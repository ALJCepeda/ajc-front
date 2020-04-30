import {timelineAPI} from "@/modules/timeline/store/api";
import {APIAction} from "@/models/Action";

class TimelineAction <
  IAPI extends IEndpoint<IAPI['IRequest'], IAPI['IResponse']>
> extends APIAction<TimelineModuleState, IAPI> {
  module = 'timeline';
}

export const TimelineActions = {
  LOAD: new TimelineAction<TimelinePage>('Fetch a page of TimelineEntries', (context, action) => {
    return timelineAPI.getPage(action.payload);
  }),
  UPSERT: new TimelineAction<TimelineSave>('Save or update a TimelineEntry', (context, action) => {
    return timelineAPI.save(action.payload);
  }),
  DELETE: new TimelineAction<TimelineRemove>('Delete a TimelineEntry', (context, action) => {
    return timelineAPI.remove(action.payload);
  }),
};