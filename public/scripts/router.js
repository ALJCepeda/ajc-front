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
			},
			default: function() {
				self.gotDefaultPage();
			},
		  	pageRoute: function(pageHash) {
                self.gotPage(pageHash);
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
