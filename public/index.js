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
        this.activeMenuItem = ko.observable();
        this.activePage = ko.observable();

        this.setMenuItem = function(name) {
            var element = document.getElementById('menu_' + name);
            self.activeMenuItem().className = '';
            self.activeMenuItem(element);
            element.className += ' active';
            console.log('Did set item: ' + name);
        };

        this.setPage = function(name) {
            var element = document.getElementById('page_' + name);
            self.activePage().className = '';
            self.activePage(element);
            element.className += ' active';
            console.log('Did set page: ' + name);
        };

        this.activeMenuItem.subscribe(function(itemElement) {
            var name = itemElement.name;
            var elem = document.getElementById('page_' + name);
            if(elem === null) {
                injector.injectComponent(pageContainer, 'components/home', {
                    append:true,
                    modifyHTML:function(html) {
                        return '<div id="page_' + name +'" class="page well">' + html + '</div>';
                    }
                }).then(function(result) {
                    self.setPage(name);
                }).catch(function(e) {
                    debugger;
                });
            }
        });

        this.didClickMenu = function(item) {
            self.setMenuItem(item);
        };
    };

    var vm = new mainVM();
	ko.applyBindings(vm, document.getElementById('main'));

    var homeItem = document.getElementById('menu_Home');
    var homePage = document.getElementById('page_Home');
    vm.activeMenuItem(homeItem);
    vm.activePage(homePage);
    homeItem.className += ' active';
    homePage.className += ' active';
});
