define([], function() {
    var pageContainer = document.getElementById('pageContainer');
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

        this.activeMenuItem.subscribe(function(itemElement) {
            var elem = document.getElementById('page_' + itemElement.name);

            if(elem === null) {
                console.log('Page hasn\'t been injected');
            }
        });

        this.didClickMenu = function(item, e) {
            var elem = e.currentTarget;
            elem.className += 'active';

            self.activeMenuItem().className = '';
            self.activeMenuItem(elem);
            console.log('Did Click: ' + item);
        }
    };

    var vm = new mainVM();
	ko.applyBindings(vm, document.getElementById('main'));

    var home = document.getElementById('menu_Home')
    vm.activeMenuItem(home);
    home.className += 'active';
});
