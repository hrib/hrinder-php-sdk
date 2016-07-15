var page = require('webpage').create();


page.open('https://www.whatismyip.com/', function() {

page.includeJs("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", function() {
    

    
    var resHtml = page.evaluate(function() {
        return document.documentElement.innerHTML;
    });
    page.render('ip1.png');

    
    setTimeout(function(){
        page.render('ip2.png');
    }, 5000);


    setTimeout(function(){
        page.render('ip3.png');
        console.log(resHtml);
        phantom.exit();
    }, 10000);
    
    
  });
})
