import { state, mutations, getNeedsFetch } from './../../src/services/store.js';

describe('store.js', () => {
  it('should should set general property', () => {
    mutations.general(state, { firstname: 'Alfred'});

    expect(state.general.firstname).toBe('Alfred');
  });

  it('should get keys that need to be fetched', () => {
    const state = {
      general: { firstname: 'Alfred' },
      city: { 'Yorktown, New York': null }
    };
    const data = {
      general: [ 'firstname', 'lastname', 'image' ],
      city: [ 'Yorktown, New York' ],
      addresses: [ '2763 Moreland St' ]
    };

    const needsFetch = getNeedsFetch(state, data);

    expect(needsFetch).toEqual({
      general: [ 'lastname', 'image' ],
      city: [ 'Yorktown, New York' ],
      addresses: [ '2763 Moreland St' ]
    });
  });
});
