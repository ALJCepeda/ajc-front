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

    const parts = [ method, href ];
    if(!_.isNil(query)) {
      parts.push(JSON.stringify(query));
    }

    if(!_.isNil(data)) {
      parts.push(JSON.stringify(data));
    }

    const digest = parts.join('');
    const requestKey = md5(digest);

    this.requestKeys.set(requestKey, requestInfo);
    return requestKey;
  }

  request({ method, href, query, data }) {
    const requestKey = this.requestKey({ method, href, query, data });
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

  set(requestKey, data = [], options = {}) {
    let map = this.cache.get(requestKey);

    if(_.isNil(map)) {
      map = new Map();
      this.cache.set(requestKey, map);
    }

    const mapByField = (key, data) => {
      if(_.isString(options.mapField)) {
        const fields = data[key][mapField];

        if(_.isArray(fields)) {
          fields.forEach(field => {
            map.set(String(field), value);
          });
        }

        if(_.isString(fields)) {
          map.set(fields, value);
        }
      }
    };

    if(_.isString(options.capture)) {
      map.set(options.capture, data);
      mapByField(options.capture, data);
    }

    for(const [ key, value ] of Object.entries(data)) {
      map.set(String(key), value);
      mapByField(String(key), value);
    }
  }

  get(requestKey, data = []) {
    const result = new Map();
    const map = this.cache.get(requestKey);

    if(_.isNil(map)) {
      return null;
    }

    const getData = (key) => {
      key = String(key);

      if(map.has(key)) {
        const value = map.get(key);
        result.set(key, value);
      }
    }

    if(_.isArray(data)) {
      data.forEach(key => {
        getData(key);
      });
    } else if(_.isObject(data)) {
      getData(data.capture);
    }

    return result;
  }

  requestKey(requestInfo) {
    let { method, href, query } = requestInfo;
    query = JSON.stringify(query);
    const requestKey = md5(`${method}${href}${query}`.toLowerCase());
    this.requestKeys.set(requestKey, requestInfo);
    return requestKey;
  }

  request(request) {
    const { method, href, query, data, options } = request;
    const requestKey = this.requestKey(request);

    if(_.isString(options.capture)) {
      const result = this.get(requestKey, options);

      if(result.size > 0) {
        return Promise.resolve(result);
      }

      return this.sendRequest({ method, href, query, data }).then(resp => {
        this.set(requestKey, resp.data, options);
        return resp.data;
      });
    } else {
      const result = this.get(requestKey, data);
      let missingIds = data;

      if(!_.isNil(result)) {
        if(result.size === data.length) {
          return Promise.resolve(result);
        }

        missingIds = data.filter(id => !result.has(id));
      }

      return this.api.sendRequest({ method, href, query, data:missingIds }).then(resp => {
        this.set(requestKey, resp.data, options);
        return this.get(requestKey, data);
      });
    }
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
      const execInfo = rule.exec(path);

      if(_.isArray(execInfo)) {
        const result = { rule, options };

        if(execInfo.length > 1) {
          options.capture = execInfo[1];
        }

        return result;
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
api.addRule(/\/blogs\/[\w-]+/, { mapField:'uris' });

api.addRule('/timeline/manifest');
api.addRule('/timeline/entries', { isMap:true });
api.addRule('/timeline/entriesByPage');

export default api;
