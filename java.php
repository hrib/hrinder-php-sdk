<script>
var client_id = '464891386855067';
var app_url = 'https://www.facebook.com/connect/login_success.html';
var loginWindow = window.open('https://www.facebook.com/dialog/oauth?response_type=token&client_id=' + client_id + '&redirect_uri=' + app_url, 'Login facebook', false);
console.log('logando');


var myVar = setInterval(function(){ myTimer() }, 1000);
contador = 0;
function myTimer(){
console.log(loginWindow.document.URL);
contador = contador + 1;
if(contador > 5){
clearInterval(myVar);
console.log('fim');
}
}
</script>
