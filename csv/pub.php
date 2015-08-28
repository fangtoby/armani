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
 /**
 * 简单对称加密算法之解密
 * @param String $string 需要解密的字串
 * @param String $skey 解密KEY
 * @author Anyon Zou <zoujingli@qq.com>
 * @date 2013-08-13 19:30
 * @update 2014-10-10 10:10
 * @return String
 */
 function decode($string = '', $skey = 'cxphp') {
    $strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
    $strCount = count($strArr);
    foreach (str_split($skey) as $key => $value)
        $key <= $strCount && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
    return base64_decode(join('', $strArr));
 }

$string = "wrsd7903sdf*#dfasd/";
$skey = "MASTER";

if (!isset($_GET['scode']) || decode($_GET['scode'],$skey)  != $string) {
    echo "<div style='color:red;text-align:center;'>您无权限下载。</div>";
    exit;
}

$agent = $_SERVER['HTTP_USER_AGENT'];

$isMac = false;

if (eregi('Mac', $agent)){ 
    $isMac = true;
}