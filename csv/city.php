<?php

ini_set('display_errors', 'on');

ini_set('date.timezone','Asia/Shanghai');

$cfgDb = array(
    'host' => 'localhost',
    'user' => 'masterofglow',
    'pass' => 'TLhB1MLMjt',
    'name' => 'masterofglow_comeyes_cn'
);

$isOK;

$link = mysql_connect($cfgDb['host'], $cfgDb['user'], $cfgDb['pass']);
if ($link) {
    $db_name = $cfgDb['name'];
    $isOK = mysql_select_db($db_name);
    mysql_query("SET NAMES 'UTF8'", $link);
}

ob_end_clean();  
ob_start();  

function export_csv($filename,$data) { 
    header("Content-type:text/csv"); 
    header("Content-Disposition:attachment;filename=".$filename); 
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0'); 
    header('Expires:0'); 
    header('Pragma:public'); 
    echo $data; 
} 

$agent = $_SERVER['HTTP_USER_AGENT'];

$isMac = false;

if (eregi('Mac', $agent)){ 
    $isMac = true;
}

$sql = 'SELECT t.cityId,c.CityName,p.name,count(*) as number FROM lottery t left join city c on c.CityID = t.cityId left join prize p on p.id = t.giftId group by t.cityId,t.giftId';


// SELECT t.cityId,c.CityName,p.name,count(*) as number FROM lottery t
// left join city c on c.CityID = t.cityId
// left join prize p on p.id = t.giftId
// group by t.cityId,t.giftId

// SELECT c.CityName,m.ShopName,p.name,count(*) as number FROM `lottery` t
// left join market m on m.ShopID = t.marketId
// left join city c on c.CityID = t.cityId
// left join prize p on p.id = t.giftId
// group by t.marketId,t.giftId
// order by t.cityId,t.marketId

if (!$isOK) {
	echo "DB Error!";
}

$res  = mysql_query($sql);

$str = "ID,地区,奖品名称,奖品数量\n"; 


while ($row = mysql_fetch_assoc($res)) {
	//var_dump($row);
	//exit;
	$cityId = $row['cityId'];
	$CityName = $row['CityName'];
	$name = $row['name'];
	$number = $row['number'];
    $str .= $cityId.','.$CityName.','.$name.','.$number. "\n";
}
if (!$isMac) {
     $str = iconv('utf-8','gb2312',$str);
}

$filename = date('Ymd').'.csv'; //设置文件名 
export_csv($filename,$str); //导出 




