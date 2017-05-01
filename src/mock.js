import moment from 'moment';

let Work = {
  Name: 'N/A',
  link: '#',
  logo: require('./assets/images/work-icon.png')
};

export default {
  general: {
    firstname: 'Alfred',
    lastname: 'Cepeda',
    birthdate: moment('8/30/1988'),
    hometown: 'Yorktown Heights, New York'
  },
  addresses: [
    {
      number: 8,
      street: 'Brisa Lane',
      city: 'Port Saint Lucie',
      state: 'Florida',
      zip: 34952,
      country: 'United States of America',
      start: moment('8/1/2017'),
      end: null
    }, {
      number: 811,
      street: 'North Main Street',
      city: 'Independence',
      state: 'Oregon',
      zip: 97351,
      country: 'United States of America',
      start: moment('6/1/2016'),
      end: moment('8/1/2017')
    }, {
      number: 175,
      street: 'Independence Way',
      city: 'Independence',
      state: 'Oregon',
      zip: 973451,
      country: 'United States of America',
      start: moment('8/1/2012'),
      end: moment('6/1/2016')
    }
  ],
  jobs: [
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
  education: [
    {
      type: 'college',
      name: 'University of Central Florida',
      degree: 'Bachelor\'s in Interdisciplinary Studies',
      graduated: moment('3/1/2012'),
      href: 'https://ucf.edu'
    }, {
      type: 'highschool',
      name: 'Newsome Highschool',
      graduated: moment('6/1/2008'),
      href: 'http://newsome.mysdhc.org'
    }
  ]
};
