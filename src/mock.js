import _ from '_';
import moment from 'moment';

let Work = {
  Name: 'N/A',
  link: '#',
  logo: require('./assets/images/work-icon.png')
};

let mock = {
  general: {
    firstname: 'Alfred',
    lastname: 'Cepeda',
    birthdate: moment('8/30/1988'),
    hometown: 'Yorktown Heights, New York'
  },
  cities: { },
  addresses: { },
  jobs: [ ],
  homes: [ ],
  education: {
    college: {
      name: 'University of Central Florida',
      degree: 'Bachelor\'s in Interdisciplinary Studies',
      graduated: moment('3/1/2012'),
      href: 'https://ucf.edu',
      logo: 'https://www.ucf.edu/wp-content/uploads/2015/06/ucf.png'
    },
    highschool: {
      name: 'Newsome High School',
      graduated: moment('6/1/2008'),
      href: 'http://newsome.mysdhc.org'
    }
  }
};

let cities = [
  {
    name: 'Yorktown Heights',
    state: 'New York',
    shortState: 'NY',
    zip: 'N/A',
    country: 'United States of America',
    logo: null,
    href: null
  }, {
    name: 'Independence',
    state: 'Oregon',
    shortState: 'OR',
    country: 'United States of America',
    logo: null,
    href: null
  }, {
    name: 'Portland',
    state: 'Oregon',
    shortState: 'OR',
    country: 'United States of America',
    logo: null,
    href: null
  }, {
    name: 'Port Saint Lucie',
    state: 'Florida',
    shortState: 'FL',
    country: 'United States of America',
    logo: null,
    href: null
  }, {
    name: 'Kansas City',
    state: 'Kansas',
    shortState: 'KS',
    country: 'United States of America',
    logo: null,
    href: null
  }
];

cities.forEach((city) => {
  let key = `${city.name}, ${city.shortState}`;

  if (!_.isUndefined(mock.cities[key])) {
    throw new Error('Primary key already defined:', key);
  }

  mock.cities[key] = city;
});

let addresses = [
  {
    number: 2763,
    street: 'Moreland St',
    city: mock.cities['Yorktown Heights, NY']
  }, {
    number: 175,
    street: 'Independence Way',
    city: mock.cities['Independence, OR']
  }, {
    number: 811,
    street: 'North Main St',
    city: mock.cities['Independence, OR']
  }, {
    number: 8,
    street: 'Brisa Ln',
    city: mock.cities['Port Saint Lucie, FL']
  }, {
    number: 1620,
    street: 'SE Green Acres Cir',
    unit: 'N-103',
    city: mock.cities['Port Saint Lucie, FL']
  }, {
    number: 6811,
    street: 'Shawnee Mission Pkwy',
    unit: '#206',
    city: mock.cities['Overland Park, KS']
  }
];

addresses.forEach((address) => {
  var key = `${address.number} ${address.street}`;

  if (_.isString(address.unit)) {
    key = `${key} ${address.unit}`;
  }

  if (!_.isUndefined(mock.cities[key])) {
    throw new Error('Primary key already defined:', key);
  }

  mock.addresses[key] = address;
});

mock.homes = [
  {
    address: mock.addresses['1620 SE Green Acres Cir N-103'],
    zip: 34952,
    start: moment('4/1/2017'),
    end: null
  }, {
    address: mock.addresses['8 Brisa Ln'],
    zip: 34952,
    start: moment('8/1/2016'),
    end: moment('3/31/2017')
  }, {
    address: mock.addresses['811 North Main St'],
    zip: 97351,
    start: moment('6/1/2015'),
    end: moment('8/1/2016')
  }, {
    address: mock.addresses['175 Independence Way'],
    zip: 97351,
    start: moment('8/1/2012'),
    end: moment('6/1/2015')
  }, {
    address: mock.addresses['2763 Moreland St'],
    zip: 10598,
    start: null,
    end: null
  }
];

mock.jobs = [
  Object.assign({
    company: 'Nikao Coporation',
    title: 'Front End Developer',
    href: 'https://www.linkedin.com/company/nikao-corporation',
    address: mock.addresses['6811 Shawnee Mission Pkwy'],
    start: moment('2/27/17'),
    end: null
  }, Work), Object.assign({
    company: 'Self-Employed',
    title: 'Software Engineer',
    address: mock.addresses['8 Brisa Lane'],
    start: moment('1/1/2012'),
    end: moment('2/27/17')
  }, Work)
];

export default mock;
