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
class SendMessage{
	
	private $uid = "clarisonic2014lucky";
	private $pwd = "ccegroup2014&mobile";
	private $mobile;
	private $msg;
	private $dtime;
	private $optional_headers = NULL;
	private $url = "http://www.smsadmin.cn/smsmarketing/wwwroot/api/post_send/";
	
	public function __construct($mobile, $msg, $dtime = NULL) {
		$this->mobile = $mobile;
		$this->msg = $msg;
		$this->dtime = $dtime;
    }
	
	public function send(){
		$data = array(
			'uid'=>$this->uid,
			'pwd'=>$this->pwd,
			'mobile'=>$this->mobile,
			'msg'=>$this->msg,
			'dtime'=>$this->dtime
		);
		
		$params = array('http' => array(
					  'method' => 'POST',
					  'content' => $data
				   ));
				   
		 if ($this->optional_headers !== null) {
			$params['http']['header'] = $this->optional_headers;
		 }
		 $ctx = stream_context_create($params);
		 $fp = @fopen($this->url, 'rb', false, $ctx);
		 if (!$fp) {
			throw new Exception("Problem with $url, $php_errormsg");
		 }
		 $response = @stream_get_contents($fp);
		 if ($response === false) {
			throw new Exception("Problem reading data from $url, $php_errormsg");
		 }
		 return $response;
	}
	
	public function sendMs(){
		$data = array(
			'uid'=>$this->uid,
			'pwd'=>$this->pwd,
			'mobile'=>$this->mobile,
			'msg'=>$this->msg,
			'dtime'=>$this->dtime
		);
		
		$o = "" ;
		foreach ( $data as $k => $v ) 
		{ 
			 $o .= " $k = " . urlencode ( $v ) . " & " ;
		} 
		
		$post_data = substr ( $o , 0 ,- 1 );
		$ch = curl_init () ;
		curl_setopt ( $ch , CURLOPT_POST , 1 );
		curl_setopt ( $ch , CURLOPT_HEADER , 0 );
		curl_setopt ( $ch , CURLOPT_URL , $this->url );
		curl_setopt ( $ch , CURLOPT_POSTFIELDS , $post_data );
		$result = curl_exec ( $ch );
		
		return $result;
	}
}