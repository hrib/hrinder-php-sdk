var port = 6100;
var page = require("webpage").create();
page.open("http://google.com", function() { });

var pictureNum = 0;
require("webserver").create().listen(port, function(request, response) {
  var src = "my_picture_" + (pictureNum++) + ".png";
  response.writeHead(200, { 'Content-Type': 'text/html' });
  response.write("written " + src);
  response.close();
  page.render(src);
});
console.log("listening on port", port);
