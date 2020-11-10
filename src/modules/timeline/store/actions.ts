import {timelineAPI} from "./api";
import {APIAction} from "@/models/Action";
import {ActionContext} from "vuex";
import {lazyActionDictionaryFrom} from "@/models/LazyDictionary";

export abstract class TimelineAction<
  IAPI extends IEndpoint<IAPI['IRequest'], IAPI['IResponse']>
> extends APIAction<TimelineModuleState, IAPI, AppState> {
  module = 'timeline'
}

class TimelinePage extends TimelineAction<ITimelinePage> {
  task = 'Fetch a timeline page'
  handler(context: ActionContext<TimelineModuleState, AppState>, action: ActionPayload<ITimelinePage["IRequest"]>): Promise<ITimelinePage["IResponse"]> {
    return timelineAPI.getPage(action.payload);
  }
}

class TimelineSave extends TimelineAction<ITimelineSave> {
  task = 'Save a TimelineEntry'
  handler(context: ActionContext<TimelineModuleState, AppState>, action: ActionPayload<ITimelineSave["IRequest"]>): Promise<ITimelineSave["IResponse"]> {
    return timelineAPI.save(action.payload);
  }
}

class TimelineRemove extends TimelineAction<ITimelineRemove> {
  task = 'Remove a TimelineEntry'
  handler(context: ActionContext<TimelineModuleState, AppState>, action: ActionPayload<ITimelineRemove["IRequest"]>): Promise<ITimelineRemove["IResponse"]> {
    return timelineAPI.remove(action.payload);
  }
}

export const TimelineActions = lazyActionDictionaryFrom({
  PAGE: TimelinePage,
  UPSERT: TimelineSave,
  DELETE: TimelineRemove
});