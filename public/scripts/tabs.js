define([], function() {
    return [
        { id:'home', name:'Home', hash:'#home', url:'/components/home.php' },
        { id:'eval', name:'Eval', hash:'#eval', url:'/components/eval.php' },
        { id:'repair', name:'Repair', hash:'#repair', url:'/components/repair.php' },
        { id:'portfolio', name:'Portfolio', hash:'#portfolio', url:'/components/portfolio.php', js:'/components/portfolio.js' },
        { id:'aboutme', name:'About Me', hash:'#aboutme', url:'/components/aboutme.php' },
        { id:'invalid', hash:'#invalid', url:'/components/invalid.php' }
    ];
});
