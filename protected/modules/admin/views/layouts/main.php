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

	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>main.css" />
	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>form.css" />
	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>admin/main.css" />
<script src="<?=Data::$data['staticUri']['js']?>jquery-1.7.1.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
  <title>首页</title>
</head>
<body>
     <div id="content">
     	<?php echo $content; ?>
     </div><!-- content -->
</body>
<script>
</script>
</html>
