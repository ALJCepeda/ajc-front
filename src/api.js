import _ from '_';
import mock from './mock.js';

const api = function() {};

api.prototype.keyInject = {
  '$first': function(coll, offset, length) {
    let start = (coll.length - 1) - (offset || 0);

    if (!_.isUndefined(length)) {
      debugger;
      return api.slice(coll, start, start + length);
    } else {
      debugger;
      return api.key(coll, start);
    }
  },
  '$last': function(coll, offset, length) {
    let start = 0 + (offset || 0);

    if (!_.isUndefined(length)) {
      debugger;
      return api.slice(coll, start, start + length);
    } else {
      debugger;
      return api.key(coll, start);
    }
  }
};

api.prototype.all = function(coll) {
  return new Promise((resolve, reject) => {
    resolve(mock[coll]);
  });
};

api.prototype.slice = function(coll, start, end) {
  return new Promise((resolve, reject) => {
    resolve(mock[coll].slice(start, end - start));
  });
};

api.prototype.id = function(coll, id) {
  return mock[coll].find((entry) => {
    return entry.id === id;
  });
};

api.prototype.key = function(coll, key, offset) {
  return new Promise((resolve, reject) => {
    var result;
    if (key[0] === '$') {
      var inject = this.keyInject[key];

      if (_.isFunction(inject)) {
        result = inject(mock[coll], offset);
      }
    } else {
      result = mock[coll][key];
    }

    resolve(result);
  });
};

api.prototype.keys = function(coll, keys) {
  let promises = [];
  let result = {};

  keys.forEach((key) => {
    if (_.isObject(key)) {
      if (_.isArray(key.offset)) {
        promises.push(this.key.apply(this, key.offset).then((data) => {
          result[key.key] = data;
        }));
      } else {
        promises.push(this.key(coll, key.key, key.offset).then((data) => {
          result[key.key] = data;
          return data;
        }));
      }
    } else {
      promises.push(this.key(coll, key).then((data) => {
        result[key] = data;
        return data;
      }));
    }
  });

  return Promise.all(promises).then((all) => {
    result['$all'] = all;
    return result;
  });
};

export default api;
