define(['main', '/scripts/tabs', '/scripts/router'], function(Main, tabs, Router ) {
	var router = new Router(main, tabs);
	var main = new Main(tabs, router);
	ko.applyBindings(main, document.getElementById('main'));

	router.start();
});
