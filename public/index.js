define(['ScrollMagic', 'TweenMax', 'scripts/main', 'scripts/tabs', 'scripts/router', 'animation.gsap', 'debug.addIndicators'], function(ScrollMagic, TweenMax, Main, tabs, Router) {
	var controller = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onEnter", duration: "200%"}});


	// build scenes
	new ScrollMagic.Scene({triggerElement: "#parallax1"})
					.setTween("#parallax1 > div", {y: "80%", ease: Linear.easeNone})
					.addIndicators()
					.addTo(controller);

	new ScrollMagic.Scene({triggerElement: "#parallax2"})
					.setTween("#parallax2 > div", {y: "80%", ease: Linear.easeNone})
					.addIndicators()
					.addTo(controller);

	new ScrollMagic.Scene({triggerElement: "#parallax3"})
					.setTween("#parallax3 > div", {y: "80%", ease: Linear.easeNone})
					.addIndicators()
					.addTo(controller);

	new ScrollMagic.Scene({triggerElement: "#parallax4"})
					.setTween("#parallax4 > div", {y: "80%", ease: Linear.easeNone})
					.addIndicators()
					.addTo(controller);
});
