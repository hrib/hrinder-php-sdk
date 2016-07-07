function FacebookLogin($email, $password) {  
    $cookies= 'cookie_file.txt';
    $user_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.94 Safari/537.36';
    
    $data = array('charset_test' => htmlspecialchars("&euro;,&acute;,â‚¬,Â´,æ°´,Ð”,Ð„"),
            	'lsd' => 'OsC-Z',
            	'locale' => 'en_US',
            	'email' => $this->email,
            	'pass' => $this->pass,
            	'persistent' => 1,
            	'default_persistent'=> 0); 
	$post = http_build_query($data);

	$ch = curl_init();  
	curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/login.php');  
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);  
	curl_setopt($ch, CURLOPT_REFERER, 'https://www.facebook.com/');  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);    
	curl_setopt($ch, CURLOPT_FILETIME, 1);  
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);  
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);   
	curl_setopt($ch, CURLOPT_POST, 1);  
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);  
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookies);  
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookies);  
	curl_exec($ch); 
			
    $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
	curl_close($ch);
		  	
	return $http;   
}

// Grab the access token from the FB API
function FacebookToken() {
	$cookies= 'cookie_file.txt';
    $user_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.94 Safari/537.36'; 
	
    // You need to sniff out the client ID below with Charles and switch it for the app that you're targetting
    $client_id = 109674171476;
    // Sniff out the permissions that the app is requesting with Charles too. They should be comma separated 
    $scope = 'email,user_birthday';
    $uri = 'https://www.facebook.com/connect/login_success.html';
	$url = 'https://www.facebook.com/dialog/oauth?client_id='.$client_id.'&redirect_uri='.urlencode($uri).'&scope='.$scope.'&response_type=token';
			
	$ch = curl_init();  
	curl_setopt($ch, CURLOPT_URL, $url);  
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookies);  
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookies);  
	$data = curl_exec($ch);   
    $curl_info = curl_getinfo($ch);

	// Get the headers and then the HTTP code
	$headers = substr($data, 0, $curl_info['header_size']);
	$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	// Make sure that the HTTP redirects to a location that has an access token in the URL
	if($code == 302) {
		preg_match("!\r\n(?:Location|URI): *(.*?) *\r\n!", $headers, $matches);
		$break = explode("access_token=", $matches[1]);

		if(count($break) == 2) {
			// Split the URL once more to get the access token value
			$exp = explode("&", $break[1]);
			$token = $exp[0];								
		}  else {
			$token = 'Failed';
		}
	} else {
		$token = 'Failed';
	}
			
	return $token;  
} 
