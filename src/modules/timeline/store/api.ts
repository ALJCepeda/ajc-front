import {get, post, remove} from "@/services/http";;

export const timelineAPI = {
  getPage: get<TimelinePage>('/timeline'),
  save: post<TimelineSave>('/timeline'),
  remove: remove<TimelineRemove>('/timeline')
};
