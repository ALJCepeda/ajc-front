import Axios, {AxiosRequestConfig} from "axios";

class HTTPCache {
  routes: Map<string, Map<string, any>> = new Map();

  getRouteMap(url:string) {
    if(!this.routes.has(url)) {
      this.routes.set(url, new Map());
    }

    return this.routes.get(url) as Map<string, any>;
  }

  saveGet(url:string, query:any, resp:any) {
    const routeMap = this.getRouteMap(url);
    const queryStr = JSON.stringify(query);
    routeMap.set(queryStr, resp);
  }
}

const axios = Axios.create({
  baseURL: process.env.VUE_APP_API_URL,
  timeout: 5000
});

export function request(method:string, url:string, config?:AxiosRequestConfig) {
  return axios.request({
    method, url, ...config
  }).then(resp => resp.data);
}

export function get(url:string, config?:AxiosRequestConfig) {
  return request('get', url, config);
}

export const http = {
  timeline: {
    get:(params:{
      page:number,
      limit:number
    }) => { return get('/timeline', { params }); }
  }
}
