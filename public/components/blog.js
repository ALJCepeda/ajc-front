define(['/libs/bareutil.ajax'], function(ajax) {
    var Blog = function() {
        this.entries = ko.observableArray();
    };

    Blog.prototype.loadEntries = function() {
        var self = this;
        ajax.get('/actions/blog/entries.php').then(function(entries) {
            self.entries(JSON.parse(entries));
        });
    };

    Blog.prototype.clickedEntry = function(entry) {
        console.log(entry);
    };

    var blog = new Blog();
    blog.loadEntries();
    return blog;
});
