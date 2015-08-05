<!--首页
<a href="<?=$this->createUrl('index/list')?>">商品列表页 &gt;</a>
-->
<?php

$appId = "wxc2efec250f2952a3";

$domain = "wxresponse.comeyes.com";

$link ="http://masterofglow.comeyes.cn";
	
$id = "7";

$ulink =  urlencode("http://{$domain}/External/Oauth.ashx?link={$link}&id={$id}");

$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appId}&redirect_uri={$ulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";

?>
<a href="<?=$url?>">登陆</a>
<ul>
	<li>appid:<span class="appid"></span></li>
    <li>TimesTamp:<span class="TimesTamp"></span></li>
    <li>NonceStr:<span class="NonceStr"></span></li>
    <li>SignaTure:<span class="SignaTure"></span></li>
</ul>
<pre>
<?php

var_dump($_GET['info']);
?>
</pre>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
<script src="<?=Data::$data['staticUri']['js']?>jquery-1.7.1.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
<script>
// JavaScript Document
// WEIXIN SHARE
$.ajax({
	url:'http://armani2014.ccegroup.cn/ArmaniGetSignaturePara.ashx?Token=3808053',
	type:'get',
	dataType:"jsonp",
	jsonp:"flightHandler",
	jsonpCallback:"callback",
	data:{
		urlAddress:window.location.href
	},
	success: function(msg){
		weixin(msg);
	},
	error:function(e){
		//alert(e);
	}});
			
function flightHandler(w)
{
	$('.appid').html(w.AppID);
	$('.TimesTamp').html(w.TimesTamp);
	$('.NonceStr').html(w.NonceStr);
	$('.SignaTure').html(w.SignaTure);
	weixin(w);
}

function weixin(msg)
{
	wx.config({
		debug: false,// 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
		appId: msg.AppID,// 必填，公众号的唯一标识
		timestamp:msg.TimesTamp, // 必填，生成签名的时间戳
		nonceStr: msg.NonceStr, // 必填，生成签名的随机串
		signature: msg.SignaTure,// 必填，签名，见附录1
		jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
		
	});
	wx.ready(function(){
		wx.onMenuShareTimeline({
			title:'唇膏原来还可以这样玩', // 分享标题
			link: 'http://armani2014.ccegroup.cn/campaign/new2015/wap.html?utm_source=weixinshare&rid=123R', // 分享链接
			imgUrl:'http://armani2014.ccegroup.cn/campaign/new2015/images/share.jpg', // 分享图标
			success: function () { 
				// 用户确认分享后执行的回调函数
				//alert('sharedone');
			},
			cancel: function () { 
				// 用户取消分享后执行的回调函数
			}
		});
		
	});
	
	wx.error(function(res){
		//alert('error');
	});
}

</script>