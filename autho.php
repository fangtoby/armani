<?php
function authRequest($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:')); 
	$data = curl_exec($ch);
	curl_close($ch);

	var_dump(json_decode($data));
}
	
if(isset($_GET['code'])){
	$code = $_GET['code'];
	echo "code:".$_GET['code'];
	$weiboAuthoUrl = "https://api.weibo.com/oauth2/access_token?";
	$registeredRedirect = "http://masterofglow.comeyes.cn/autho.php";
	$clientSecret = "b9c38995ee427ea6c98058d3a8f84d0b";
	$clentId = "3163304423";
	$url = "{$weiboAuthoUrl}client_id={$clentId}&client_secret={$clientSecret}&grant_type=authorization_code&redirect_uri={$registeredRedirect}&code={$code}";
	
	authRequest($url);
	
}else{
	echo "error";	
}

