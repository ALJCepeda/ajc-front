export default {
  // http://stackoverflow.com/questions/2450954/how-to-randomize-shuffle-a-javascript-array
  shuffle: function(array) {
    var currentIndex = array.length;
    var temporaryValue;
    var randomIndex;

    // While there remain elements to shuffle...
    while (currentIndex !== 0) {
      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;

      // And swap it with the current element.
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }

    return array;
  },
  findMissingIndexes: function(array, start, end) {
    const missing = [];
    for(let i=start; i<end; i++) {
      if(_.isUndefined(array[i]) || _.isNull(array[i])) {
        missing.push(i);
      }
    }

    return missing;
  },
  rangeFromLimit = function(limit, offset, max) {
    let start = offset;
    let end = offset + limit;

    if(limit < 0) {
      end = offset;
      start = offset - limit;

      if(start < 0) {
        start = 0;
        end = end + Math.abs(start);
      }
    }

    if(end > max) {
      end = max;
    }

    return { start, end };
  }
};
