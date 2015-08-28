<?php

require_once('pub.php');

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

$str = "编号,地区,奖品名称,奖品数量\n"; 


while ($row = mysql_fetch_assoc($res)) {
	//var_dump($row);
	//exit;
	$cityId = $row['cityId'];
	$CityName = $row['CityName'];
	$name = $row['name'];
	$number = $row['number'];
    $str .= $cityId.','.$CityName.','.$name.','.$number."\n";
}
if (!$isMac) {
     $str = iconv('utf-8','gb2312',$str);
}

$filename = 'City_lottery_'.date('Ymd').'.csv'; //设置文件名 
export_csv($filename,$str); //导出 




