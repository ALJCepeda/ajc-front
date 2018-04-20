import util from './../../src/services/util.js';

describe('util.js', () => {
  describe('findMissingIndexes', () => {
    it('should find all missing indexes', () => {
      const arr = [];
      arr[3] = true;
      arr[6] = true;
      arr[7] = true;
      arr[0] = null;
      arr[5] = null;

      const result = util.findMissingIndexes(arr, 0, 10);
      expect(result).toEqual([0, 1, 2, 4, 5, 8, 9 ]);
    });
  });
});
