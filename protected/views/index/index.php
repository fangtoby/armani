<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta content="telephone=no" name="format-detection" />
    <link href="<?=Data::$data['staticUri']['css']?>style.css" rel="stylesheet" />
    <script>
        var g_config = {
                validateUrl:{
                    wx:"<?=$url['wx'];?>",
                    wb:"<?=$url['wb'];?>"
                },
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
    <!-- 移动端版本兼容 end -->
    <title>致敬阿玛尼 底妆大师十五周年</title>
    <script src="<?=Data::$data['staticUri']['js']?>jquery.min.js"></script>
    <script src="<?=Data::$data['staticUri']['js']?>index.animate.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66237221-1', 'auto');
  ga('send', 'pageview');

</script>
	
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="<?=Data::$data['staticUri']['js']?>wechat.js"></script>
	</head>
<body>
<div class='loading'>
	<div  class='mask'>
		<img src='<?=Data::$data['staticUri']['img']?>loading.jpg'/>
	</div>
	
	<img src='<?=Data::$data['staticUri']['img']?>loading_on.jpg' />
	<p>Loading...<em>1</em>%</p>
</div>

 <div class='animate' style='display:none'>
 <div class='part0' style='display:none'>
		 <img src='<?=Data::$data['staticUri']['img']?>logo_b.jpg' width='100%' style='display:none'/>
		<img src='<?=Data::$data['staticUri']['img']?>logo.jpg' width='100%' style='display:none'/>
		<img src='<?=Data::$data['staticUri']['img']?>01.jpg' width='100%'style='display:none'/>
	</div>
	<div class='part1' style='display:none'>
		<img src='<?=Data::$data['staticUri']['img']?>gifjpg/1-0.jpg' width='100%' height='100%' />
	</div>
	<div class='part2' style='display:none'>
		<img src='<?=Data::$data['staticUri']['img']?>p1_1.png' width='100%' />
		<img src='<?=Data::$data['staticUri']['img']?>p1_2.png' width='100%' />
		<img src='<?=Data::$data['staticUri']['img']?>p1_3.png' width='100%' />
		<img src='<?=Data::$data['staticUri']['img']?>p1copy.png' width='100%' style='position: relative;top: -40px;display:none' />
	</div>
	<div class='part3' style='display:none'>
		<img src='<?=Data::$data['staticUri']['img']?>p3_0.png' width='100%'  class='p3cp0'>
		<img src='<?=Data::$data['staticUri']['img']?>p3_1.png' width='100%'  class='p3cp1' style='display:none' />
		<img src='<?=Data::$data['staticUri']['img']?>p3_2.png' width='100%' class='p3cp2' style='display:none'/>
		<img src='<?=Data::$data['staticUri']['img']?>p3_3.png' width='100%'  class='p3cp3' style='display:none' />
		<p class='year' style='display:none'><em>2000</em>年</p>
		<a href='javascript:;' style='display:none'><img src='<?=Data::$data['staticUri']['img']?>p3btn.png' /></a>
	</div>
 </div>
</body>

</html>
