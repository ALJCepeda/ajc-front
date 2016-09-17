define(['/libs/bareutil.ajax', '/scripts/router'], function(ajax, router) {
    var Blog = function() {
        var self = this;
        this.content = {};
        this.entries = ko.observableArray();
        this.selectedEntry = ko.observable();
        this.selectedContent = ko.observable();

        router.gotBlogURL = function(url) {
            self.setEntry(url);
        };
    };

    Blog.prototype.loadEntries = function() {
        var self = this;
        return ajax.get('/actions/blog/entries.php').then(function(entries) {
            self.entries(JSON.parse(entries));
        });
    };

    Blog.prototype.loadContent = function(url) {
        var self = this;
        return ajax.get('/actions/blog/content.php?url='+url).then(function(content) {
            self.content[url] = JSON.parse(content);
        });
    };

    Blog.prototype.setEntry = function(url) {
        var self = this;
        if(typeof self.content[url] === 'undefined') {
            return self.loadContent(url).then(function() {
                self.selectedEntry(url);
                self.selectedContent(self.content[url]);

                return self.content[url];
            });
        }

        self.selectedEntry(url);
        self.selectedContent(self.content[url]);
        return Promise.resolve(self.content[url]);
    };

    Blog.prototype.clickedEntry = function(entry) {
        router.navigate('blog/'+entry.url, { trigger:true });
    };

    var blog = new Blog();
    blog.loadEntries();
    return blog;
});
