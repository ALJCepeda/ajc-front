define(['scripts/injector', 'scripts/tabs'], function(Injector, tabs) {
    var pageContainer = document.getElementById('pageContainer');
    var injector = new Injector('/');

    var MainVM = function() {
        var self = this;
        this.tabs = tabs;
        this.activeTab = ko.observable();
        this.loadedTabs = { };

        this.setTab = function(tab) {
            var previousTab = this.activeTab();
            if(this.loadedTabs[tab.name] !== true) {
                injector.injectView(pageContainer, tab.url, {
                    append:true,
                    modifyHTML:function(html) {
                        return '<div id="page_' + tab.name +'" class="page well">' + html + '</div>';
                    }
                }).then(function(element) {
                    var containedElem = document.getElementById('page_' + tab.name);
                    if(tab.js === true) {
                        var model = require([tab.url]);
                        ko.applyBindings(model, containedElem);
                        return {
                            model:model,
                            element:containedElem
                        };
                    } else {
                        return {
                            element:containedElem
                        };
                    }
                }).then(function(result) {
                    self.loadedTabs[tab.name] = true;
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
            if(typeof tab === 'undefined') {
                return;
            }

            var menuElem = document.getElementById('menu_' + tab.name);
            var pageElem = document.getElementById('page_' + tab.name);
            menuElem.className = '';
            pageElem.className = 'page well';
        };

        this.makeActive = function(tab) {
            var menuElem = document.getElementById('menu_' + tab.name);
            var pageElem = document.getElementById('page_' + tab.name);
            menuElem.className = 'active';
            pageElem.className = 'page well active';
        };

        this.didClickMenu = function(tab) {
            self.setTab(tab);
        };
    };
    return new MainVM();
});
