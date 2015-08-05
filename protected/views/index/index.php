<!--首页
<a href="<?=$this->createUrl('index/list')?>">商品列表页 &gt;</a>
-->
<?php

$appId = "wxc2efec250f2952a3";

$domain = "wxresponse.comeyes.com";

$link ="http://masterofglow.comeyes.cn?scope=snsapi_userinfo";
	
$id = "7";

$ulink =  urlencode("http://{$domain}/External/Oauth.ashx?link={$link}&id={$id}");

$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appId}&redirect_uri={$ulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";

?>
<a href="<?=$url?>">登陆</a>

<?php

/*
$SendMessage = new SendMessage('14782593339','HelloWorld');

echo $SendMessage->sends();
*/