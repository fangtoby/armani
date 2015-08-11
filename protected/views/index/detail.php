<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
  <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?=Data::$data['staticUri']['css']?>main.css?v=<?=Yii::app()->params['version']['css'];?>">
  <title>申请明星粉底</title>
  <style>
  </style>
</head>
<body>
    <div id="content">
    <span><?php // echo $info['nickname']; ?></span>
    
    <?php
	$place = "十多个地方asdfasx43mlutf8-gbk-uft8{}remove";
	$prize = "对待xx";
	$placeg = iconv('UTF-8', 'GB2312', $place);
	$prizeg = iconv('UTF-8', 'GB2312', $prize);
	$msg = SMessage::sendMs("14782593339",$placeg,$prizeg);
	//$msg = SMessage::sendMs("14782593339",$place,$prize);
		//echo iconv('GB2312', 'UTF-8',SMessage::test("14782593339",$placeg,$prizeg));
	echo $msg;
	?>
    </div><!-- content -->
</body>
<script>
</script>
</html>
