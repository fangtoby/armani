<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
  <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>main.css?v=<?=Yii::app()->params['version']['css'];?>">
  <title>申请明星粉底</title>
  <style>
  </style>
</head>
<body>
    <div id="content">
	<?php

		echo SendMessage::send('14782593339','34',NULL);
    echo "<br />";

    echo Yii::app()->session['uid'];
    echo "<br />";
	?>
		<a href="<?=$this->createUrl('index/list',array('pid'=>$pid))?>">&lt;返回 </a>
        <span>选择的是<?=$pid?></span>
    	 <ul class="product-list">
        	<li><a href="<?=$this->createUrl('index/follow',array('did'=>1,'pid'=>$pid))?>"> 详情1 </a></li>
        	<li><a href="<?=$this->createUrl('index/follow',array('did'=>2,'pid'=>$pid))?>"> 详情2 </a></li>
        	<li><a href="<?=$this->createUrl('index/follow',array('did'=>3,'pid'=>$pid))?>"> 详情3 </a></li>
        </ul>
    </div><!-- content -->
</body>
<script src="<?=Data::$data['staticUri']['js']?>jquery-1.7.1.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
<script>
</script>
</html>
