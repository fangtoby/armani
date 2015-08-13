<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta content="telephone=no" name="format-detection" />
    <link href="<?=Data::$data['staticUri']['css']?>style.css" rel="stylesheet" />
    <script>
    	var g_config = {					
				openid:"<?=$info["openid"];?>",
				nickname:'<?=$info["nickname"];?>',
				headimgurl:"<?=$info["headimgurl"];?>",
				from:"<?=$info["from"];?>",//g_config.from == 0 微信 1 微博
				path:{
					js:"<?=Data::$data['staticUri']['js']?>",
					css:"<?=Data::$data['staticUri']['css']?>",
					img:"<?=Data::$data['staticUri']['img']?>"
				}
			};
    </script>
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
    <script src="<?=Data::$data['staticUri']['js']?>setInfo.js"></script>
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
<img src='<?=Data::$data['staticUri']['img']?>qrcode.png' class='qrcode' style='display:none'/>
<div class='page'>
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
		<img src='' class='cardbg'/>
		<div class='self_info'>
			
			<img src='<?=Data::$data['staticUri']['img']?>img.jpg' width='70px' height='70px' />
			<span>name</span>
		</div>
		<a href='javascript:;'><img src='<?=Data::$data['staticUri']['img']?>cardbtn.jpg' /></a>
	</div>
 </div>
 <div class='overlay' style='display:none'>
		
	<div class='setinfo' style='display:none'>
		<a href='javascript:;' class='close'>close</a>
		<div class='popup1' style='display:none'>
			<img src='<?=Data::$data['staticUri']['img']?>tips.png' />
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
			<a href='javascript:;'><img src='<?=Data::$data['staticUri']['img']?>submitbtn.png' /></a>
			</form>
		</div>
		
		<div class='popup2' style='display:none'>
			
			<span class='msg'>恭喜您<br>
			获取阿玛尼赋予5ml权利粉饼<br>
			我们将短信通知邀您莅临专柜
			</span>
			<img src='<?=Data::$data['staticUri']['img']?>scale.png'/>
			<a href='javascript:;' class='share'><img src='<?=Data::$data['staticUri']['img']?>submitbtn.png' /></a>
		
	 	
	 	</div>
	
	</div>
	
	
	<div class='shareTips' style='display:none'>
		<img src='<?=Data::$data['staticUri']['img']?>sharetips.png' />
	</div>
 </div>
 </div>
</body>

</html>
