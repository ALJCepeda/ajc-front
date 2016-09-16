define([], function() {
	var Router = function() {
		this.backRouter = '';
	};

	Router.prototype.start = function() {
		var self = this;
		var BackRouter = Backbone.Router.extend({
		  	routes: {
				"":"default",
				":url":"pageRoute",
				"blog/:title":"blogRoute"
			},
			default: function() {
				self.gotDefaultPage();
			},
		  	pageRoute: function(pageHash) {
                self.gotPage(pageHash);
			},
			blogRoute: function(title) {
				self.gotPage('blog');
				self.gotTitle(title);
			}
		});

		this.backRouter = new BackRouter();
		Backbone.history.start();
	}

	Router.prototype.navigate = function(route, options) {
		this.backRouter.navigate(route, options);
	};

	return new Router();
});
