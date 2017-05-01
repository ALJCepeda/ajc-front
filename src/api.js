import mock from './mock.js';

export default {
  test: mock['addresses'],
  name: 'Alfred Cepeda',
  image: require('./assets/images/me.jpeg'),
  all: function(key) {
    return mock[key];
  },
  get: function(key, id) {
    return mock[key].find((entry) => {
      return entry.id === id;
    });
  },
  i: function(key, index) {
    console.log(key);
    console.log(index);
    console.log(mock);
    console.log(mock[key]);
    console.log(mock[key][index]);
    return mock[key][index];
  }
};
