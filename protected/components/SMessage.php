<?php
/**
* ����˵��:uid     ��ָ�������ƽ̨��ע����˺�  
* 		  pwd    ��Ϊƽ̨��¼����
* 		  mobile ��Ҫ�����˵��ֻ����롣���Խ��ж���Ⱥ�������ͺ�����Ӣ��";"����
* 		  msg    �Ƕ��ŷ��͵�����
* 		  dtime  ָ�����ŷ��͵�ʱ�� ���ʱ��Ϊnull ������������(2010-2-25 13:28:00)
* 		  
* ���ز���:0���ͳɹ�
* 		  1�û������������
* 		  2����
* 		  3�������������10000��
* 		  4���û��������� 
* 		  5�ֻ��Ż�����Ϣ����Ϊ�� 
* 		  6.���������ַ� 
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
		
		$msg = "��ϲ�����ר����ױȨ����д�����ڣ�ƾ��Ϣݰ�ٰ�����{$place}��ױר���������Ƿ۵�����װ($prize)һ�ݣ�����15�������������������ޣ����꼴ֹ������������ױ��
";
		
		//$msg = urlencode(iconv('UTF-8', 'GB2312', $msg));
		//$msg = iconv('UTF-8', 'GB2312', $msg);
		
		$url = self::$url."?uid=".self::$uid."&pwd=".self::$pwd."&mobile=".$mobile."&msg=".$msg."&dtime=''";
		$html = iconv('GBK', 'UTF-8', file_get_contents($url));
		$result = substr($html, 0, 1 );
		if($result == "0"){
			return true;	 
		}else{
			return false;
		}
	}
	public static function send($mobile, $msg, $dtime = NULL){
		
		self::$mobile = $mobile;
		self::$msg = $msg;
		self::$dtime = $dtime;

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
	function sends($mobile, $msg, $dtime = NULL){
		
		self::$mobile = $mobile;
		self::$msg = $msg;
		self::$dtime = $dtime;

		$data = array(
			'uid'=>self::$uid,
			'pwd'=>self::$pwd,
			'mobile'=>self::$mobile,
			'msg'=>self::$msg,
			'dtime'=>self::$dtime
		);
		
		return self::send_post(self::$url,$data);	
	}
	function send_post($url, $post_data) {  
	  
	  $postdata = http_build_query($post_data);  
	  $options = array(  
		'http' => array(  
		  'method' => 'POST',  
		  'header' => 'Content-type:application/x-www-form-urlencoded',  
		  'content' => $postdata,  
		  'timeout' => 15 * 60 // ��ʱʱ�䣨��λ:s��  
		)  
	  );  
	  $context = stream_context_create($options);  
	  $result = file_get_contents($url, false, $context);  
	  
	  return $result;  
	}  
}