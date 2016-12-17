define(['main', '/scripts/router'], function(Main, router) {
	var main = new Main();
	ko.applyBindings(main, document.getElementById('main'));

	router.start();

	/*Home script*/
	$('.home-carousel').slick();
});
