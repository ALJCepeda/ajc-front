import { state, mutations } from './../../src/services/store.js';

describe('store.js', () => {
  it('should should set general property', () => {
    mutations.general(state, { firstname: 'Alfred'});

    expect(state.general.firstname).toBe('Alfred');
  });
});
