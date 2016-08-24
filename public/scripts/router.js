define(['backbone'], function(Backbone) {
	var Router = function(main, tabs) {
		this.backRouter = '';
        this.main = main;
        this.tabs = tabs;
	};

	Router.prototype.start = function() {
		var self = this;
		var BackRouter = Backbone.Router.extend({
		  	routes: {
				"":"default",
				":url":"pageRoute",
			},
			default: function() {
				self.gotPage(self.tabs[0]);
			},
		  	pageRoute: function(pageHash) {
				var tab = self.tabs.find(function(tab) {
                    return tab.hash === '#' + pageHash;
                });

                if(typeof tab === 'undefined') {
                    tab = self.tabs[0];
                }

                self.gotPage(tab);
			}
		});

		this.backRouter = new BackRouter();
		Backbone.history.start();
	}

	Router.prototype.navigate = function(route, options) {
		this.backRouter.navigate(route, options);
	};

	return Router;
});
