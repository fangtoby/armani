<?php

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'sinaWeibo/SinaWeibo.php';

$weiboService=new SinaWeibo(WB_AKEY, WB_SKEY);
		
if (isset($_REQUEST['code'])) {
		$keys = array();
		$keys['code'] = $_REQUEST['code'];
		$keys['redirect_uri'] = WB_CALLBACK_URL;
		try {
			$token = $weiboService->getAccessToken( 'code', $keys ) ;
		} catch (OAuthException $e) {
			echo $e;
		}
}
if ($token) {
	$_SESSION['token'] = $token;
	$c = new SaeTClientV2(WB_AKEY, WB_SKEY, $_SESSION['token']['access_token']);
	$me = $c->get_uid();
	$me = $c->show_user_by_id($me['uid']);
	$gender = 3;	
	/*echo "<pre>";
	print_r($me);
	exit;*/
	switch($me['gender']){
		case 'm':
		$gender = 1;
		break;
		case 'f':
		$gender = 2;
		break;
	}
	$info = array(
		'openid'=>$me['id'],
		'nickname'=>$me['name'],
		'sex'=> $gender,
		'headimgurl'=>$me['profile_image_url'],
		'referer'=>$_SERVER['HTTP_REFERER']
	);
	//$info = str_replace('"',"'",json_encode($info));
	$info = http_build_query($info);

	setcookie( 'weibojs_'.$weiboService->client_id, http_build_query($token) );
	//header( "refresh:3;url=".$back_url);
	// $data = {
	// 	''
	// };
	//echo "<h1>认证已经通过，将会在3秒之后跳转到微博列表页面。如果没有，点击<a href=".$_SESSION['back_url'].">这里</a>。</h1>";exit;
	
} else {
	echo '认证失败';
}
?>
<script type="text/javascript">
	window.location.href = '/index/indexs?path=2&<?=$info?>';
</script>