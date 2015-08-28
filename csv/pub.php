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