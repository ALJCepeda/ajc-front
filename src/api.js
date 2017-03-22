import EventEmitter from 'event-emitter';

let Work = {
  Name: 'N/A',
  link: '#',
  logo: require('./assets/images/work-icon.png')
};

export default {
  name: 'Alfred Cepeda',
  image: require('./assets/images/me.jpeg'),
  work: {
    mock: [
      Object.assign({
        id: 0,
        name: 'Nikao Coporation',
        link: 'https://www.linkedin.com/company/nikao-corporation'
      }, Work), Object.assign({
        id: 1,
        name: '6-Bit Consulting'
      }, Work), Object.assign({
        id: 2,
        name: 'Self-Employed',
        link: '#'
      }, Work)
    ],
    events: new EventEmitter(),
    all: function() {

    },
    meta: function() {
      return {
        length: this.work.length
      };
    }
  }
};
