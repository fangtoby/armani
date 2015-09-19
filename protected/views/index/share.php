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
				count:"<?=$info["count"];?>",
				headimgurl:"<?=$info["headimgurl"];?>",
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
            document.write('<link href="<?=Data::$data['staticUri']['css']?>style2.css" rel="stylesheet" />');
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
    <title>致敬阿玛尼 底妆大师15周年</title>
    <script src="<?=Data::$data['staticUri']['js']?>jquery.min.js"></script>
	 <script>
    	var g_config = {					
				openid:"<?=$info["openid"];?>",
				nickname:'<?=$info["nickname"];?>',
				headimgurl:"<?=$info["headimgurl"];?>",
				path:{
					js:"<?=Data::$data['staticUri']['js']?>",
					css:"<?=Data::$data['staticUri']['css']?>",
					img:"<?=Data::$data['staticUri']['img']?>"
				}
			};
    </script>

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
<body>
<div class='card' style='display:none'>
		<img src='' class='cardbg'/>
		<div class='self_info'>
			
			<img src='<?=$info["headimgurl"];?>' width='70px' height='70px' />
			<span></span>
		</div>
		<a href='javascript:;'><img src='<?=Data::$data['staticUri']['img']?>cardbtn.jpg' /></a>
	</div>
</body>
<script>
$(function(){
$('.self_info span').html(g_config.nickname)
	var id = window.location.href.split('&v=')[1].split('&')[0];
	$('.cardbg').attr('src',  '<?=Data::$data['staticUri']['img']?>card/'+id+'.jpg')
	$('.card').fadeIn();
	$('.card a').click(function(){
		window.location.href='http://'+window.location.host
	})
})
</script>
</html>
