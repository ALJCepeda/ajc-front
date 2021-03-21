import {remove, request} from "@/services/http";
import {IEndpoint, IFetchEntries} from "ajc-shared";

export function get<
  IAPI,
  IRequest = IAPI extends IEndpoint<infer U, any> ? U : unknown,
  IResponse = IAPI extends IEndpoint<any, infer U> ? U : unknown
>(url: string): (params: IRequest) => Promise<IResponse> {
  return params => {
    return request<IResponse>("get", url, { params });
  };
}

export function post<
  IAPI,
  IRequest = IAPI extends IEndpoint<infer U, any> ? U : unknown,
  IResponse = IAPI extends IEndpoint<any, infer U> ? U : unknown
>(url: string): (params: IRequest) => Promise<IResponse> {
  return params => {
    return request<IResponse>("post", url, { params });
  };
}

export function patch<
  IAPI,
  IRequest = IAPI extends IEndpoint<infer U, any> ? U : unknown,
  IResponse = IAPI extends IEndpoint<any, infer U> ? U : unknown
>(url: string): (query: IRequest) => Promise<IResponse> {
  return query => {
    return request<IResponse>("get", url, {
      params: query
    });
  };
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
  fetchEntries: get<IFetchEntries>("/timeline"),
  createEntry: post<CreateEntryInput>("/timeline"),
  updateEntry: patch<UpdateEntryInput>("/timeline/:id")
};

