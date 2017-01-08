define([], function() {
    return [
        { id:'home', name:'Home', hash:'#home', url:'/pages/home.php' },
        { id:'blog', name:'Blog', hash:'#blog', url:'/pages/blog.php', js:'/pages/blog.js' },
        { id:'eval', name:'Eval', hash:'#eval', url:'/pages/eval.php' },
        { id:'repair', name:'Repair', hash:'#repair', url:'/pages/repair.php' },
        { id:'portfolio', name:'Portfolio', hash:'#portfolio', url:'/pages/portfolio.php', js:'/pages/portfolio.js' },
        { id:'aboutme', name:'About Me', hash:'#aboutme', url:'/pages/aboutme.php' },
        { id:'invalid', hash:'#invalid', url:'/pages/invalid.php' }
    ];
});
