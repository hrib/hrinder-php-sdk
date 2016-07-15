var page = require('webpage').create();


page.open('https://www.whatismyip.com/', function() {

page.includeJs("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", function() {
    

    
    //var resultingHtml = page.evaluate(function() {
    //    return document.title;
    //});
    page.render('ip1.png');
    //console.log(resultingHtml);

    
    setTimeout(function(){
        page.render('ip2.png');
        //console.log('print');
    }, 5000);


    setTimeout(function(){
        page.render('ip3.png');
        var resHtml = page.evaluate(function() {
            return document.documentElement.innerHTML;
        });
        console.log(resHtml);
        phantom.exit();
    }, 10000);
    
    
  });
})
