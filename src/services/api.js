import _ from '_';
import md5 from 'md5';
import axios from 'axios';

class CachedHandler {
  constructor(api) {
    this.api = api;
    this.cache = new Map();
    this.requestKeys = new Map();
  }

  set(requestKey, resp) {
    this.cache.set(requestKey, resp);
  }

  get(requestKey) {
    return this.cache.get(requestKey);
  }

  requestKey(requestInfo) {
    let { method, href, query, data } = requestInfo;

    if(_.isObject(data) || _.isArray(data)) {
      data = JSON.stringify(data);
    }

    query = JSON.stringify(query);
    const requestKey = md5(`${method}${href}${query}${data}`.toLowerCase());
    this.requestKeys.set(requestKey, requestInfo);
    return requestKey;
  }

  request({ method, href, query, data }) {
    const requestKey = this.requestKey({ method, href, query });
    const result = this.get(requestKey);
    if(!_.isNil(result)) {
      return Promise.resolve(result);
    }

    return this.api.sendRequest({ method, href, query, data }).then(resp => {
      this.set(requestKey, resp.data);
      return resp.data;
    });
  }
}

class MappedHandler {
  constructor(api) {
    this.api = api;
    this.cache = new Map();
    this.requestKeys = new Map();
  }

  set(requestKey, data) {
    let map = this.cache.get(requestKey);

    if(_.isNil(map)) {
      map = new Map();
      this.cache.set(requestKey, map);
    }

    for(const [ key, value ] of Object.entries(data)) {
      map.set(String(key), value);
      debugger;
    }
  }

  get(requestKey, data = []) {
    const result = new Map();
    const map = this.cache.get(requestKey);

    if(_.isNil(map)) {
      return null;
    }

    data.forEach(key => {
      key = String(key);
      if(map.has(key)) {
        result.set(key, map.get(key));
      }
    });

    return result;
  }

  requestKey(requestInfo) {
    let { method, href, query } = requestInfo;
    query = JSON.stringify(query);
    const requestKey = md5(`${method}${href}${query}`.toLowerCase());
    this.requestKeys.set(requestKey, requestInfo);
    return requestKey;
  }

  request({ method, href, query, data }) {
    const requestKey = this.requestKey({ method, href, query, data });
    const result = this.get(requestKey, data);
    let missingIds = data;

    if(!_.isNil(result)) {
      if(result.entries().length === data.length) {
        return Promise.resolve(result);
      }

      missingIds = data.filter(id => !result.has(id));
    }

    return this.api.sendRequest({ method, href, query, data:missingIds }).then(resp => {
      debugger;
      this.set(requestKey, resp.data);
      return this.get(requestKey, data);
    });
  }
}

class API {
  constructor(axiosConfig) {
    this.axios = axios.create(axiosConfig);
    this.strRules = new Map();
    this.regexRules = new Map();
    this.cached = new Map();

    this.mappedHandler = new MappedHandler(this);
    this.cachedHandler = new CachedHandler(this);
  }

  addRule(rule, options = {}) {
    if(_.isRegExp(rule)) {
      return this.regexRules.set(rule, options);
    }

    if(_.isString(rule)) {
      return this.strRules.set(rule, options);
    }

    throw new Error('Rules must be a RegExp or String');
  }

  matchRule(path) {
    if(this.strRules.has(path)) {
      return { rule:path, options:this.strRules.get(path) };
    }

    for(const [ rule, options ] of this.regexRules) {
      if(rule.test(path)) {
        return { rule, options };
      }
    }

    return null;
  }

  sendRequest({ method, href, query, data }) {
    return this.axios({
      method, url:href, query, data
    });
  }

  request(request) {
    let { href } = request;
    const ruleInfo = this.matchRule(href);

    if(ruleInfo === null) {
      return this.sendRequest(request).then(resp => resp.data);
    }

    const { options } = ruleInfo;
    request.options = options;

    if(options.isMap === true) {
      return this.mappedHandler.request(request);
    } else {
      return this.cachedHandler.request(request);
    }
  }

  get(href, query) {
    const method = 'get';
    return this.request({ method, href, query });
  }

  post(href, data, query) {
    const method = 'post';
    return this.request({ method, href, query, data });
  }
}


export { API };

const api = new API({
  baseURL:process.env.API_URL,
  timeout:5000
});

api.addRule('/blogs/manifest');
api.addRule('/blogs/entries', { isMap:true });
api.addRule('/blogs/entriesByPage');
api.addRule(/\/blogs\/[\w-]+/);

api.addRule('/timeline/manifest');
api.addRule('/timeline/entries', { isMap:true });
api.addRule('/timeline/entriesByPage');

export default api;
