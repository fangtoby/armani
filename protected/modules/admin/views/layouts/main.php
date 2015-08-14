<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>form.css" />
	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>admin/main.css?v=<?=Yii::app()->params['version']['css'];?>" />
	<script src="<?=Data::$data['staticUri']['js']?>jquery-1.7.1.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
    <script src="<?=Data::$data['staticUri']['js']?>laydate/laydate.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
  <title>首页</title>
</head>
<body>
<div class="container" id="page">
	 <div id="header" class="clearfix">
     	<div class="top-menus">
        <?php if(!Yii::app()->admin->isGuest): ?>
		<?php echo CHtml::link('店铺管理','/admin/market/admin'); ?> |
		<?php echo CHtml::link('奖品设置','/admin/prize/admin'); ?> |
		<?php echo CHtml::link('中奖记录','/admin/lottery/admin'); ?> |
		<?php echo CHtml::link('地区管理','/admin/city/admin'); ?> |
		<?php echo CHtml::link('修改密码','/admin/default/password'); ?> 
        <?php endif; ?>
		<?php if(!Yii::app()->admin->isGuest): ?>
			| <?php echo CHtml::link( '退出',array('/admin/default/logout')); ?>
            | <?php echo "<a href='#' class='admin-name' > 您好 : ".Yii::app()->admin->name."</a>"; ?>
		<?php endif; ?>
		</div>
     	<h1>CCE-2015</h1> 
     </div>
     <?php echo $content; ?>
     
</div>
<div class="footer">
	<span>CCE-2015 &copy;</span>
</div>
</body>
<script>
</script>
</html>
