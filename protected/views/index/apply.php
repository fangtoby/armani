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
    	<div >
    	<input placeholder="手机号码" type="text" id="phone" />
        </div>
    	<div >
        <select id="city" >
        	<?php foreach($city as $i){ ?>
        	<option value="<?=$i['CityID']?>"><?=$i['CityName']?></option>
        	<?php } ?>
        </select>
        </div>
    	<div >
        <select id="counter" >
        	<?php foreach($market as $i){ ?>
				<?php if($i['CityID'] == 1){ ?>
                <option value="<?=$i['ShopID']?>"><?=$i['ShopName']?></option>
                <?php } ?>
        	<?php } ?>
        </select>
        </div>
        <button id="apply">提交</button>
    </div><!-- content -->
</body>
<script src="<?=Data::$data['staticUri']['js']?>jquery-1.7.1.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
<script src="<?=Data::$data['staticUri']['js']?>shops.js?v=<?=Yii::app()->params['version']['js'];?>"></script>
<script>
	console.log(ss);
	var i = 0;
	/*var timer = window.setInterval(function(){
		send(ss['result'][i]);
		i++;
	},2000);*/
	$('#apply').click(function(e) {
        var data = {
			'cityId':  $('#city option:selected').val() ,
			'marketId': $('#counter option:selected').val(),
			'type': 1,
			'phone': $('#phone').val(),
		};
		send(data);
    });
	function send(data){
		 $.ajax({
				 type: "GET",
				 url: "/api/addinfo",
				 data: data,
				 dataType:'json',
				 success: function(data){
					console.log(data);
				 }
		});
	}
</script>
</html>
