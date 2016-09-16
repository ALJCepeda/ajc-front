define(['/libs/bareutil.ajax', '/scripts/router'], function(ajax, router) {
    var Blog = function() {
        var self = this;
        this.entries = ko.observableArray();

        router.gotTitle = function(title) {
            console.log("Got blog title: ", title);
        };
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
