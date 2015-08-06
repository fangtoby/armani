<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
  <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>main.css?v=<?=Yii::app()->params['version']['css'];?>">
  <title>首页</title>
</head>
<!--
      <a href="<?=$url?>">登陆</a>
-->
<body>
     <div id="content">
     	<b>首页动画展示，动画展示<em class="lessTime">3</em>完成之后js跳转登陆验证url:<?=$url?></b>
     </div><!-- content -->
</body>
<script src="<?=Data::$data['staticUri']['js']?>jquery-1.7.1.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
<script>
	var number = 3;
	var url = "<?=$url?>";
	var timer = setInterval(function(){
		if(number > 0){
			$('.lessTime').html( number );
		}else{
			window.location.href = url;
			clearInterval(timer);	
		}
		number--;
	},1000);
</script>
<script src="<?=Data::$data['staticUri']['js']?><?=$this->id;?>/<?=$this->action->id;?>.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
</html>
