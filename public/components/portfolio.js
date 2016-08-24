define([], function() {
    var Entry = function(base) {
        var self = this;
        this.base = base;
        this.id = '';
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
    projections.id = 'projections';
    projections.name = 'Financial Projections';
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

    var ipad = new Entry('assets/images/portfolio/ipad/');
    ipad.id = 'ipad';
    ipad.name = 'Electronic Repair';
    ipad.images = [
        { name:'Broken', url:'broken.jpg', isActive:ko.observable(false) },
        { name:'Open', url:'opened.jpg', isActive:ko.observable(false) },
        { name:'Repaired', url:'repaired.jpg', isActive:ko.observable(false) },
        { name:'Finished', url:'finished.jpg', isActive:ko.observable(false) }
    ];
    ipad.faq = [
        {   question:'How long did it take?',
            answer:'The entire process from start to finish took less than 30 minutes',
            isActive:ko.observable(false)   },
        {   question:'How much did it cost?',
            answer:'In order to buy all the toys and necessary parts to perform the repair cost a total of $140...which was still $70 less than the $200 pricetag the Apple store gave me',
            isActive:ko.observable(false)   },
        {   question:'Will you repair my device?',
            answer:'Sure, but better yet I\'ll point you to the resources so you can do it yourself. Its really easy, will save you a ton of money and boost your confidence for repairing other electronics',
            isActive:ko.observable(false)   }
    ];
    ipad.images[0].isActive(true);
    ipad.selectedImage(ipad.images[0]);
    ipad.faq[0].isActive(true);
    ipad.selectedFAQ(ipad.faq[0]);

    var terror = new Entry('assets/images/portfolio/terror/');
    terror.id = 'terror';
    terror.name = 'Terror Torch';
    terror.images = [
        { name:'FrontUI', url:'frontui.png', isActive:ko.observable(false) },
        { name:'Gallery', url:'gallery.png', isActive:ko.observable(false) },
        { name:'Camera', url:'camera.jpg', isActive:ko.observable(false) },
        { name:'Sound', url:'sound.png', isActive:ko.observable(false) },
        { name:'About', url:'about.png', isActive:ko.observable(false) }
    ];
    terror.faq = [
        {   question:'What\'s the point of this app?',
            answer:'TerrorTorch\'s main attraction was the ability to frighten people as they passed by camera by playing a sudden loud sound. The camera would record their reactions and the video would be uploaded to a server to be viewed in a public gallery. This was a project being hosted by the domain http://reBaked.com',
            isActive:ko.observable(false)   },
        {   question:'What\'s the big power button in FastUI?',
            answer:'The app also featured a flashlight which is managed by this control. It\'s possible to adjust the intensity of the flashlight by rotating this control like a dial',
            isActive:ko.observable(false)   },
        {   question:'How long did it take?',
            answer:'It took a little more than three months to complete, I was the project\'s only programmer. TerrorTorch was tested, approved and uploaded to iTunes Connect where it awaited final approval from the project manager. It was never released :(',
            isActive:ko.observable(false)   },
        {   question:'Why was it never released?',
            answer:'I wish I knew. I was never contacted by the project manager and the domain was sold soon after. As far as I know the project is still waiting to be sent for review... I sometimes wonder the legal issues of releasing the app myself but I haven\'t done the research',
            isActive:ko.observable(false)   },
        {   question:'What are some special design features?',
            answer:'Motion detection is able to sense when a person passes infront of the camera. Videos uploaded to server and shared on a youtube gallery. Was developed during iOS Beta 8 series and was ready to release before the beta was completed, written almost entirely in Swift',
            isActive:ko.observable(false)   }
    ];
    terror.images[0].isActive(true);
    terror.selectedImage(terror.images[0]);
    terror.faq[0].isActive(true);
    terror.selectedFAQ(terror.faq[0]);

    var interest = new Entry('assets/images/portfolio/interest/');
    interest.id = 'interest';
    interest.name = 'Interest Calculator';
    interest.images = [
        { name:'Chart', url:'chart.png', isActive:ko.observable(false) },
        { name:'Grid', url:'grid.png', isActive:ko.observable(false) },
        { name:'Loading', url:'loading.png', isActive:ko.observable(false) },
        { name:'Full Gird', url:'fullgrid.png', isActive:ko.observable(false) },
        { name:'Full Chart', url:'fullchart.png', isActive:ko.observable(false) },
        { name:'Edit Grid', url:'editgrid.png', isActive:ko.observable(false) },
    ];
    interest.faq = [
        {   question:'What\'s the point of this app?',
            answer:'This is a calculator that takes some basic financial information and calculates a rough estimate of how their accounts will grow over time. It can also guess different field such as the number of years or the annual interest rate necessary for the account the reach a final value.',
            isActive:ko.observable(false)   },
        {   question:'How long was development',
            answer:'It took about 3 1/2 months, I\'ve developed most of this feature except for few minor backend tasks like user preferences.',
            isActive:ko.observable(false)   },
        {   question:'What are some special design features?',
            answer:'Fully responsive UI that fits the width of any device. The ui is completely non-blocking and all the code is beautifully organized and fully unit tested',
            isActive:ko.observable(false)   }
    ];
    interest.images[0].isActive(true);
    interest.selectedImage(interest.images[0]);
    interest.faq[0].isActive(true);
    interest.selectedFAQ(interest.faq[0]);

    var other = new Entry('assets/images/portfolio/other/');
    other.id = 'other';
    other.name = 'Other Work';
    other.images = [
        { name:'Gameofficials', url:'gameofficials.png', isActive:ko.observable(false) },
        { name:'Divergence', url:'divergence.png', isActive:ko.observable(false) },
        { name:'Bodyworks', url:'bodyworks.png', isActive:ko.observable(false) },
        { name:'Clinipro', url:'clinipro.png', isActive:ko.observable(false) },
        { name:'Omnipod', url:'omnipod.png', isActive:ko.observable(false) },
        { name:'Diabetes', url:'diabetes.png', isActive:ko.observable(false) }
    ];
    other.faq = [
        {   question:'Tell me about Gameofficials',
            answer:'A web application written with Coldfusion, it matches referees with games in the local area. I was a full stack developer and lead 5 minor releases while I was there including huge optimizations to MySQL queries and stored procedues',
            isActive:ko.observable(false)   },
        {   question:'Tell me about Divergence',
            answer:'A game written in Unity3D set in the future in an infinitely large procedurally generated world. I was involed in helping devlop their inventory system and interface with UML plugin that allowed for randomly generated avatars',
            isActive:ko.observable(false)   },
        {   question:'Tell me about Bodyworks',
            answer:'A simple website I improved for a local messeuse to show cased services she offered. The server was hacked and contained a virus so I was in charge of removing the threat, patching the vulnerability and updating some of the content',
            isActive:ko.observable(false)   },
        {   question:'Tell me about the rest',
            answer:'Clinipro/Omnipod/Diabetes was part of company named Numedics that provided software for hospitals in the area. It was written with ASP.Net MVC, I was in charge of improving front-end and managed version control and release. I helped develop implement several long lasting policies',
            isActive:ko.observable(false)   }
    ];
    other.images[0].isActive(true);
    other.selectedImage(other.images[0]);
    other.faq[0].isActive(true);
    other.selectedFAQ(other.faq[0]);

    return {
        entries: [ projections, ipad, terror, interest, other ]
    };
});
