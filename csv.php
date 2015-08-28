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

$sql = 'SELECT c.CityName,m.ShopName,t.phone,p.name,u.nickname,u.sex,t.from,t.createTime FROM lottery t '.
'left join user u on u.id = t.uid left join market m on m.ShopID = t.marketId left join city c on c.CityID = t.cityId left join prize p on p.id = t.giftId order by t.cityId,t.marketId,t.giftId';


if (!$isOK) {
	echo "DB Error!";
}

$fromMap = array('微信',"微博");
$sexs = array(1=> '男',2=> '女');

$res  = mysql_query($sql);

$str = "地区,门店,手机号码,奖品名称,性别,来源,抽奖时间\n"; 

if ($isMac) {
    $str = "地区,门店,手机号码,奖品名称,客户昵称,性别,来源,抽奖时间\n"; 
}


while ($row = mysql_fetch_assoc($res)) {
	//var_dump($row);
	//exit;
	$cityname = $row['CityName'];
	$shopname = $row['ShopName'];
	$phone = $row['phone'];
	$name = $row['name'];
    if ($isMac) {
       $nickName = json_decode( $row['nickname'] );
    }
	$sex = $sexs[$row['sex']];
	$from = $fromMap[$row['from']];
	$createTime = $row['createTime'];
	if ($isMac) {
        $str .= $cityname.','.$shopname.','.$phone.','.$name.','.$nickName.','.$sex.','.$from.','.$createTime . "\n";
    }else{
        $str .= $cityname.','.$shopname.','.$phone.','.$name.','.$sex.','.$from.','.$createTime . "\n";
    }
}
if (!$isMac) {
     $str = iconv('utf-8','gb2312',$str);
}

$filename = date('Ymd').'.csv'; //设置文件名 
export_csv($filename,$str); //导出 




