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
        company: 'Nikao Coporation',
        title: 'Front End Developer',
        href: 'https://www.linkedin.com/company/nikao-corporation'
      }, Work), Object.assign({
        id: 1,
        company: '6-Bit Consulting'
      }, Work), Object.assign({
        id: 2,
        company: 'Self-Employed',
        link: '#'
      }, Work)
    ],
    all: function() {
      return this.mock;
    },
    get: function(id) {
      return this.mock.find((entry) => {
        return entry.id === id;
      });
    },
    ids: function(id) {
      return this.mock.map((entry) => entry.id);
    },
    i: function(index) {
      return this.mock[index];
    }
  }
};
