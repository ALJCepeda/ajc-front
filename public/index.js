define(['scripts/injector'], function(Injector) {
    var pageContainer = document.getElementById('pageContainer');
    var injector = new Injector('/');

    var mainVM = function() {
        var self = this;
        this.menu = [
            'Home',
            'Eval',
            'Snake',
            'Repair',
            'Portfolio',
            'About Me'
        ];
        this.activeTab = ko.observable('Home');
        this.loadedTabs = { 'Home':true };

        this.setTab = function(tab) {
            var previousTab = this.activeTab();
            if(this.loadedTabs[tab] !== true) {
                injector.injectComponent(pageContainer, 'components/home', {
                    append:true,
                    modifyHTML:function(html) {
                        return '<div id="page_' + tab +'" class="page well">' + html + '</div>';
                    }
                }).then(function(result) {
                    self.loadedTabs[tab] = true;
                    self.makeInactive(previousTab);
                    self.makeActive(tab);
                    self.activeTab(tab);
                });
            } else {
                self.makeInactive(previousTab);
                self.makeActive(tab);
                self.activeTab(tab);
            }
        };

        this.makeInactive = function(tab) {
            var menuElem = document.getElementById('menu_' + tab);
            var pageElem = document.getElementById('page_' + tab);
            menuElem.className = '';
            pageElem.className = 'page well';
        };

        this.makeActive = function(tab) {
            var menuElem = document.getElementById('menu_' + tab);
            var pageElem = document.getElementById('page_' + tab);
            menuElem.className = 'active';
            pageElem.className = 'page well active';
        };

        this.didClickMenu = function(item) {
            self.setTab(item);
        };
    };

    var vm = new mainVM();
	ko.applyBindings(vm, document.getElementById('main'));

    //Since menu items are loaded dynamically, menu item needs to be set active
    var menuElem = document.getElementById('menu_' + vm.activeTab());
    menuElem.className += 'active';
});
