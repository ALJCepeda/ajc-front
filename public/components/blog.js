define([], function() {
    var Entry = function() {
        this.url = '';
        this.name = '';
        this.content = '';
    };

    var Blog = function() {
        this.entries = [];
    };
    console.log('Connected');

    return new Blog();
});
