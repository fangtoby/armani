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
  <script language="javascript">
  	var g_config = {
		openid:"<?=$info["openid"];?>",
		nickname:"<?=$info["nickname"];?>",
		headimgurl:"<?=$info["headimgurl"];?>"
	};
  </script>
<body>
    <div id="content">
    	<a href="<?=$this->createUrl('index/apply')?>">申请明星粉底 &gt;</a>
        
        <ul>
            <li>appid:<span class="appid"></span></li>
            <li>TimesTamp:<span class="TimesTamp"></span></li>
            <li>NonceStr:<span class="NonceStr"></span></li>
            <li>SignaTure:<span class="SignaTure"></span></li>
        </ul>
        <?php 
        	 echo Yii::app()->session['uid'];
    echo "<br />";
        ?>
        <span>已结登陆</span>
        <ul class="product-list">
        	<li><a href="<?=$this->createUrl('index/detail',array('pid'=>1))?>"> 详情1 </a></li>
        	<li><a href="<?=$this->createUrl('index/detail',array('pid'=>2))?>"> 详情2 </a></li>
        	<li><a href="<?=$this->createUrl('index/detail',array('pid'=>3))?>"> 详情3 </a></li>
        </ul>
        <?php //echo var_dump($info); ?>
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



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta content="telephone=no" name="format-detection" />
    <link href="<?=Data::$data['staticUri']['css']?>style.css" rel="stylesheet" />
    <!--移动端版本兼容 -->
    <script type="text/javascript">
        var phoneWidth = parseInt(window.screen.width);
        var phoneScale = phoneWidth / 640;
        var ua = navigator.userAgent;
        if(window.screen.height == 480) {
           // document.write('<link href="css/style2.css" rel="stylesheet" />');
        }
        if(/Android (\d+\.\d+)/.test(ua)) {
            var version = parseFloat(RegExp.$1);
            if(version > 2.3) {
                document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
            } else {
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
            }
        } else {
            document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
        }
    </script>
    <!--移动端版本兼容 end -->
    <title></title>
    <script src="<?=Data::$data['staticUri']['js']?>jquery.min.js"></script>
    <script src="<?=Data::$data['staticUri']['js']?>shops.js"></script>
    <script src="<?=Data::$data['staticUri']['js']?>setinfo.js"></script>
    <script src="<?=Data::$data['staticUri']['js']?>index.js"></script>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', '', 'auto');
	  ga('send', 'pageview');

	</script>
	
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="<?=Data::$data['staticUri']['js']?>wechat.js"></script>
	</head>
<body style='background: #000' >
 <div class='category'  style='display:none' >
	<a href='javascript:;' class="apply1"></a>
	<a href='javascript:;' class="catest"></a>
	<a href='javascript:;' class="catesec"></a>
	<a href='javascript:;' class="catethird"></a>
 </div>
 <div class='sub_category' style='display:none'>
	<a href='javascript:;' class="apply1"></a>
	<a href='javascript:;' class="back"></a>
	<a href='javascript:;' class="btn1"></a>
	<a href='javascript:;' class="btn2"></a>
	<a href='javascript:;' class="btn3"></a>
 </div>
 <div class='result' style='display:none'>
	<div class='card'>
		<img src='images/card/s1_1.jpg' class='cardbg'/>
		<div class='self_info'>
			
			<img src='images/img.jpg' width='70px' height='70px' />
			<span>name</span>
		</div>
		<a href='javascript:;'><img src='images/cardbtn.jpg' /></a>
	</div>
 </div>
 <div class='overlay' style='display:none'>
	<div class='setinfo' style='display:none'>
		<a href='javascript:;' class='close'>close</a>
		<img src='images/tips.png' />
		<form>
		<input type='text' placeholder='手机号码' maxLength='11'/>
		<div class='select citylist'>
			<span class='city' data-id='0'>城市</span>
			<select>
				
			</select>
		</div>
		<div class='select shoplist'>
			<span class='shop' data-id='0'>专柜</span>
			<select>
				
			</select>
		</div>
		<a href='javascript:;'><img src='images/submitbtn.png' /></a>
	</form>
	</div>
	
	<div class='backResult' style='display:none'>
		<a href='javascript:;' class='close'>close</a>
		<span class='msg'>恭喜您<br>
		获取阿玛尼赋予5ml权利粉饼<br>
		我们将短信通知邀您莅临专柜
		</span>
		<span>长按关注,共赴优雅之约</span>
		<img src='images/qrcode.png' class='qrcode' />
		<a href='javascript:;' class='share'><img src='images/submitbtn.png' /></a>
	</div>
	
	<div class='share' style='display:none'>
		<img src='images/sharetips.png' />
	</div>
 </div>
 
</body>

</html>
