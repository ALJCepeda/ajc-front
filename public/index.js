define([], function() {
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
        this.activeMenuItem;

        this.didClickMenu = function(item, e) {
            var elem = e.currentTarget;
            elem.className += 'active';

            self.activeMenuItem.className = '';
            self.activeMenuItem = elem;
            console.log('Did Click: ' + item);
        }
    };

    var vm = new mainVM();
	ko.applyBindings(vm, document.getElementById('main'));
    vm.activeMenuItem = document.getElementById('menu_Home');
    vm.activeMenuItem.className += 'active';
});
