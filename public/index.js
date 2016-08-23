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
        this.activeTab = ko.observable();
        this.loadedTabs = { };

        this.setTab = function(tab) {
            var previousTab = this.activeTab();
            var url = 'components/' + tab.toLowerCase();
            if(this.loadedTabs[tab] !== true) {
                injector.injectView(pageContainer, url, {
                    append:true,
                    modifyHTML:function(html) {
                        return '<div id="page_' + tab +'" class="page well">' + html + '</div>';
                    }
                }).then(function(element) {
                    var containedElem = document.getElementById('page_' + tab);
                    var model = require([url]);
                    ko.applyBindings(model, containedElem);
                    return {
                        model:model,
                        element:containedElem
                    };
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
            if(typeof tab === 'undefined' || tab === '') {
                return;
            }

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
    vm.setTab('Home');
});
