define(['/libs/bareutil.ajax', '/scripts/router'], function(ajax, router) {
    var Blog = function() {
        var self = this;
        this.entries = ko.observableArray();
        this.content = {};
        router.gotBlogURL = function(url) {
            //self.setEntry(url);
            console.log("Got blog url: ", url);
        };
    };

    Blog.prototype.loadEntries = function() {
        var self = this;
        ajax.get('/actions/blog/entries.php').then(function(entries) {
            self.entries(JSON.parse(entries));
        });
    };

    Blog.prototype.clickedEntry = function(entry) {
        router.navigate('blog/'+entry.url, { trigger:true });
    };

    var blog = new Blog();
    blog.loadEntries();
    return blog;
});
