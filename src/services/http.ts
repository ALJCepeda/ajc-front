import Axios, {AxiosRequestConfig} from "axios";

const axiosConfig = {
  baseURL: process.env.VUE_APP_API_URL,
  timeout: 5000
};

const axios = Axios.create(axiosConfig);

export function request<T>(method:string, url:string, config?:AxiosRequestConfig): Promise<T> {
  return axios.request({
    method, url, ...config
  }).then(resp => resp.data).catch(() => {});
}

export function get<T>(url:string, query:any, config:AxiosRequestConfig = {}): Promise<T> {
  config.params = query;
  return request<T>('get', url, config);
}

export function post<T>(url:string, body:T, config:AxiosRequestConfig = {}): Promise<T> {
  config.data = body;
  return request<T>('post', url, config);
}

export function remove(url:string, id:number, config:AxiosRequestConfig = {}): Promise<boolean> {
  config.data = { id };
  return request('delete', url, config);
}
