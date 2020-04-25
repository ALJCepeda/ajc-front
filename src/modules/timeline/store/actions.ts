import {timelineAPI} from "@/modules/timeline/store/api";
import {APIAction} from "@/models/Action";

abstract class TimelineAction <
  IAPI extends IEndpoint<IAPI['IRequest'], IAPI['IResponse']>
> extends APIAction<TimelineModuleState, IAPI> {
  module = 'timeline';
}

export class TimelineLoad extends TimelineAction<TimelinePage> {
  task = 'Fetch a page of TimelineEntries';
  handler(context, action) {
    return timelineAPI.getPage(action.payload);
  }
}

export class TimelineUpsert extends TimelineAction<TimelineSave> {
  task = 'Insert or Update TimelineEntry';
  handler(context, action) {
    return timelineAPI.save(action.payload);
  }
}

export class TimelineDelete extends TimelineAction<TimelineRemove> {
  task = 'Delete a TimelineEntry';
  handler(context, action) {
    return timelineAPI.remove(action.payload);
  }
}