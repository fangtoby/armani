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
	<?php
$msg = "恭喜您获得专属底妆权利，写七天内，凭短息莅临阿玛尼美妆专柜，尊享明星粉底体验装一份，共襄15周年礼遇。（数量有限，领完即止）【阿玛尼美妆】
";
		
		$result = SMessage::sendMs('14782593339','xx','xx');
		if($result){
			echo "发送成功";	
		}else{
			
		}
	?>
    </div><!-- content -->
</body>
<script>
</script>
</html>
