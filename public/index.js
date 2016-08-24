define(['main'], function(mainVM) {
	ko.applyBindings(mainVM, document.getElementById('main'));
    mainVM.setTab(mainVM.tabs[0]);
});
