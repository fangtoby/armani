<?php
class WeiChat {
  private $appId;
  private $appSecret;
  private $code;
  private $access_token;
  private $openId;
  
  public function __construct($appId, $appSecret , $code) {
    $this->appId = $appId;
    $this->appSecret = $appSecret;
	$this->code = $code;
  }

  public function getSignPackage() {
	$data = array();
	$access = $this->getAccessToken();
	if($access && isset($access->access_token)){
		 $this->access_token = $access->access_token;
		 $this->openId = $access->openid;
    }else{
		return false;
	}
	$userinfo = $this->getUserinfo();
	if($userinfo && isset($userinfo->unionid)){
		$data['userinfo'] = $userinfo;
	}else{
		return false;	
	}
	
    $jsapiTicket = $this->getJsApiTicket();
	
	if(!$jsapiTicket){
		return false;	
	}

    $data['access'] = array(
      "access_token" => $access_token,//
	  "jsapi_ticket" => $jsapiTicket
    );
	
    return $data; 
  }
  
  
 
  /*{
  "errcode":0,
  "errmsg":"ok",
  "ticket":"bxLdikRXVbTPdHSM05e5u5sUoXNKd8-41ZO3MhKoyN5OfkWITDGgnr2fwJ0m9E8NYzWKVZvdVtaUgWvsdshFKA",
  "expires_in":7200
  }*/
  private function getJsApiTicket() {
      $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$this->access_token";
      $res = json_decode($this->httpGet($url));
      $ticket = $res->ticket;
	  return $ticket;
  }
  
  /*  { 
  "access_token":"ACCESS_TOKEN", 
  "expires_in":7200, 
  "refresh_token":"REFRESH_TOKEN",
  "openid":"OPENID", 
  "scope":"SCOPE" 
  }
  */
  private function getAccessToken() {
      $url = "https://api.weixin.qq.com/sns/oauth2/access_token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret&code=$this->code";
      $res = json_decode($this->httpGet($url));
	  print_r($res);
      return $res;
  }
  
  /*  { 
  "openid":"OPENID",
  "nickname":"NICKNAME",
  "sex":1,
  "province":"PROVINCE",
  "city":"CITY",
  "country":"COUNTRY",
  "headimgurl": "http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/0",
  "privilege":[
  "PRIVILEGE1", 
  "PRIVILEGE2"
  ],
  "unionid": " o6_bmasdasdsad6_2sgVt7hMZOPfL"
  
  }
  */
  private function getUserinfo(){
	  $url = "https://api.weixin.qq.com/sns/userinfo?access_token=$this->access_token&openid=$this->openid";
      $res = json_decode($this->httpGet($url));
	  return $res;
  }
  
  private function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
  }
}

