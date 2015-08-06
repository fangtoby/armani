<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
  <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>main.css?v=<?=Yii::app()->params['version']['css'];?>">
  <title>商品列表页</title>
  <style>
  	.product-list li{
		padding:40px 10px;		
	}
  </style>
</head>
<!--
    <a href="<?=$this->createUrl('index/index')?>">&lt;首页 </a>
    <a href="<?=$this->createUrl('index/detail',array('pid'=>2))?>">详情页 &gt;</a>
-->
<body>
    <div id="content">
    	<a href="<?=$this->createUrl('index/apply')?>">申请明星粉底 &gt;</a>
        
        <ul>
            <li>appid:<span class="appid"></span></li>
            <li>TimesTamp:<span class="TimesTamp"></span></li>
            <li>NonceStr:<span class="NonceStr"></span></li>
            <li>SignaTure:<span class="SignaTure"></span></li>
        </ul>
        <span>已结登陆</span>
        <ul class="product-list">
        	<li><a href="<?=$this->createUrl('index/detail',array('pid'=>1))?>"> 详情1 </a></li>
        	<li><a href="<?=$this->createUrl('index/detail',array('pid'=>2))?>"> 详情2 </a></li>
        	<li><a href="<?=$this->createUrl('index/detail',array('pid'=>3))?>"> 详情3 </a></li>
        </ul>
        <?php echo var_dump($info); ?>
    </div><!-- content -->
</body>
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
<script src="<?=Data::$data['staticUri']['js']?><?=$this->id;?>/<?=$this->action->id;?>.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
</html>
