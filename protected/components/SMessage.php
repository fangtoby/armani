<?php
/**
* 参数说明:uid     是指你在这个平台上注册的账号  
* 		  pwd    即为平台登录密码
* 		  mobile 是要发送人的手机号码。可以进行短信群发，发送号码用英文";"隔开
* 		  msg    是短信发送的内容
* 		  dtime  指定短信发送的时间 如果时间为null 则是立即发送(2010-2-25 13:28:00)
* 		  
* 返回参数:0发送成功
* 		  1用户名或密码错误
* 		  2余额不足
* 		  3超过发送最大量10000条
* 		  4此用户不允许发送 
* 		  5手机号或发送信息不能为空 
* 		  6.包含敏感字符 
* 
* @author: fangtoby@live.cn
*/

class SMessage{
	
	public static $uid = "clarisonic2014lucky";
	public static $pwd = "ccegroup2014&mobile";
	public static $mobile;
	public static $msg;
	public static $dtime;
	public static $optional_headers = NULL;
	public static $url = "http://www.smsadmin.cn/smsmarketing/wwwroot/api/get_send/";
	
	public static function sendMs($mobile,$place,$prize, $dtime = NULL){
		$msg = "恭喜您获得专属底妆权利，七天内，凭短息莅临阿玛尼".$place."美妆专柜，尊享明星粉底体验装（".$prize."）一份，共襄15周年礼遇。（数量有限，领完即止）【阿玛尼美妆】";
		
		$url = self::$url."?uid=".self::$uid."&pwd=".self::$pwd."&mobile=".$mobile."&msg=".$msg."&dtime=''";
		$html = iconv('GBK', 'UTF-8', file_get_contents($url));
		$result = substr($html, 0, 1 );
		if($result == "0"){
			return true;	 
		}else{
			return false;
		}
	}
	public static function test($mobile,$place,$prize){
		/*$placeg = iconv('UTF-8', 'GB2312', $place);
		echo $placeg;
		$prizeg = iconv('UTF-8', 'GB2312', $prize);
		echo $prizeg;*/
				$msg = "恭喜您获得专属底妆权利，七天内，凭短息莅临阿玛尼".$place."美妆专柜，尊享明星粉底体验装（".$prize."）一份，共襄15周年礼遇。（数量有限，领完即止）【阿玛尼美妆】";
				return $msg;
	}
	public static function send($mobile, $place,$prize , $dtime = NULL){
		
		self::$mobile = $mobile;
		self::$dtime = $dtime;
		$msg = "恭喜您获得专属底妆权利，七天内，凭短息莅临阿玛尼{$place}美妆专柜，尊享明星粉底体验装($prize)一份，共襄15周年礼遇。（数量有限，领完即止）【阿玛尼美妆】
";
		self::$msg = $msg;
		$data = array(
			'uid'=>self::$uid,
			'pwd'=>self::$pwd,
			'mobile'=>self::$mobile,
			'msg'=>self::$msg,
			'dtime'=>self::$dtime
		);
		
		$params = array('http' => array(
					  'method' => 'POST',
					  'content' => $data
				   ));
				   
		 if (self::$optional_headers !== null) {
			$params['http']['header'] = self::$optional_headers;
		 }
		 $ctx = stream_context_create($params);
		 $fp = @fopen(self::$url, 'rb', false, $ctx);
		 if (!$fp) {
			throw new Exception("Problem with $url, $php_errormsg");
		 }
		 $response = @stream_get_contents($fp);
		 if ($response === false) {
			throw new Exception("Problem reading data from $url, $php_errormsg");
		 }
		 return $response;
	}
	public static function  sends($mobile, $place,$prize){
		
		$msg = "恭喜您获得专属底妆权利，七天内，凭短息莅临阿玛尼{$place}美妆专柜，尊享明星粉底体验装($prize)一份，共襄15周年礼遇。（数量有限，领完即止）【阿玛尼美妆】
";
		self::$msg = $msg;
		
		self::$mobile = $mobile;
		self::$msg = $msg;

		$data = array(
			'uid'=>self::$uid,
			'pwd'=>self::$pwd,
			'mobile'=>$mobile,
			'msg'=>$msg,
			'dtime'=>""
		);
		
		return self::send_post(self::$url,$data);	
	}
	public static function send_post($url, $post_data) {  
	  
	  $postdata = http_build_query($post_data);  
	  $options = array(  
		'http' => array(  
		  'method' => 'POST',  
		  'header' => 'Content-type:application/x-www-form-urlencoded',  
		  'content' => $postdata,  
		  'timeout' => 15 * 60 // 超时时间（单位:s）  
		)  
	  );  
	  $context = stream_context_create($options);  
	  $result = file_get_contents($url, false, $context);  
	  
	  return $result;  
	}  
}