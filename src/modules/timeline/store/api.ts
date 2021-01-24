import {remove, request} from "@/services/http";

export function get<
  IAPI extends IEndpoint<IAPI["IRequest"], IAPI["IResponse"]>
  >(url: string, cstr: any): (query: IAPI["IRequest"]) => Promise<IAPI["IResponse"]> {
  return query => {
    return request<IAPI["IResponse"]>("get", url, {
      params: query
    });
  };
}

export function post<
  IAPI extends IEndpoint<IAPI["IRequest"], IAPI["IResponse"]>
  >(url: string, cstr: any): (query: IAPI["IRequest"]) => Promise<IAPI["IResponse"]> {
  return query => {
    return request<IAPI["IResponse"]>("get", url, {
      params: query
    });
  };
}

export function patch<
  IAPI extends IEndpoint<IAPI["IRequest"], IAPI["IResponse"]>
  >(url: string, cstr: any): (query: IAPI["IRequest"]) => Promise<IAPI["IResponse"]> {
  return query => {
    return request<IAPI["IResponse"]>("get", url, {
      params: query
    });
  };
}

class FetchEntriesInput {
  limit: number;
  skip: number;
}

class CreateEntryInput {
  limit: number;
  skip: number;
}

class UpdateEntryInput {
  limit: number;
  skip: number;
}

export const timelineAPI = {
  fetchEntries: get("/timeline", FetchEntriesInput),
  createEntry: post("/timeline", CreateEntryInput),
  updateEntry: patch("/timeline/:id", UpdateEntryInput)
};
