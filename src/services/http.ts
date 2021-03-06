import Axios, { AxiosRequestConfig } from "axios";
import { isDataQuery } from "ajc-shared";
import {AppConfig} from "@/config/app";
import {IEndpoint, IFetchEntries} from "ajc-shared";

const axios = Axios.create({
  baseURL: `http://${AppConfig.server.host}:${AppConfig.server.port}`,
  timeout: 5000,
  withCredentials: true
});

export function request<T>(
  method: string,
  url: string,
  config?: AxiosRequestConfig
): Promise<T> {
  return axios
    .request({
      method,
      url,
      ...config
    })
    .then(resp => resp.data);
}

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
>(url: string): (request: IRequest) => Promise<IResponse> {
  return data => {
    return request<IResponse>("post", url, { data });
  };
}

export function remove<
  IAPI,
  IRequest = IAPI extends IEndpoint<infer U, any> ? U : unknown,
  IResponse = IAPI extends IEndpoint<any, infer U> ? U : unknown
>(url: string): (data: IRequest) => Promise<IResponse> {
  return data => {
    return request<IResponse>("delete", url, { data });
  };
}
