import axios from 'axios';

export const getColl = function(coll, keys) {
  return axios.get(`/collection/{coll}`, { keys });
};

export default {
  getColl
};
