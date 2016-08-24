define([], function() {
    var Entry = function(base) {
        var self = this;
        this.base = base;
        this.name = '';
        this.images = [];
        this.faq = [];
        this.selectedImage = ko.observable();
        this.selectedFAQ = ko.observable();
        this.imageSRC = ko.computed(function() {
            var selected = self.selectedImage();
            if(typeof selected === 'undefined') {
                return ''
            }

            return self.base + self.selectedImage().url;
        });
        this.clickedImage = function(image) {
            var previousImage = self.selectedImage();
            if(previousImage) {
                previousImage.isActive(false);
            }

            self.selectedImage(image);
            image.isActive(true);
        };
        this.clickedFAQ = function(faq) {
            var previousFAQ = self.selectedFAQ();
            if(previousFAQ) {
                previousFAQ.isActive(false);
            }

            self.selectedFAQ(faq);
            faq.isActive(true);
        };
    };

    var projections = new Entry('assets/images/portfolio/projections/');
    projections.name = 'Projections';
    projections.images = [
        { name:'Bar', url:'bar.png', isActive:ko.observable(false) },
        { name:'Chart', url:'chart.png', isActive:ko.observable(false) },
        { name:'Grouped', url:'grouped.png', isActive:ko.observable(false) },
        { name:'Expanded', url:'expanded.png', isActive:ko.observable(false) },
        { name:'Both', url:'expanded_grouped.png', isActive:ko.observable(false) }
    ];
    projections.faq = [
        {   question:'What am I looking at?',
            answer:'On the left side is a panel which allows you to control how (and which) calculations are done. The projections follow industy standard regulations and are displayed in various forms on the right side of the page. You\'re able to control how this data is displayed using options beneath the graphic',
            isActive:ko.observable(false)   },
        {   question:'How long was development?',
            answer:'It took me more than a month to complete this feature with limited input from a designer. I was given this task during my first week at TrustBuilders and had to build it from the ground up using technologies I had little prior experience with',
            isActive:ko.observable(false)   },
        {   question:'What technologies were used?',
            answer:'DevExpress was used for the bar and area graphs. KnockoutJS for UI two-way binding and responsiveness. Bootstrap for layout and CSS styling. Behind the scenes I was forced to make clever use of the Adapter and Delegate design patterns in order to handle some poor decisions made by my senior developer',
            isActive:ko.observable(false)   },
        {   question:'What are some special design features?',
            answer:'Fully responsive UI that fits the width of any device. The ui is completely non-blocking and all the code is beautifully organized and fully unit tested',
            isActive:ko.observable(false)   },
        {   question:'How would you improve it?',
            answer:'Currently the back-end makes use of a blob object with unintuitive keys and poorly thought out ecapsulation. Rather than client-side make use of an adapter to transform the data, server-side should just structure the data correctly. A better structure would improve server-side\'s workflow as well',
            isActive:ko.observable(false)   }
    ];
    projections.images[0].isActive(true);
    projections.selectedImage(projections.images[0]);
    projections.faq[0].isActive(true);
    projections.selectedFAQ(projections.faq[0]);

    return {
        entries: [ projections ]
    };
});
