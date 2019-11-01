import {get, post, remove} from "@/services/http";
import TimelineEntry from "../../../../../ajc-shared/src/models/TimelineEntry";
import {PaginationContext} from "@/types";

export const timelineAPI = {
  get: (
    params: PaginationContext
  ) => {
    return get<Array<TimelineEntry>>('/timeline', params);
  },
  post: (
    timelineEntry: TimelineEntry
  ) => {
    return post<TimelineEntry>('/timeline', timelineEntry);
  },
  remove: (
    id: number
  ) => {
    return remove('/timeline', id);
  }
};
