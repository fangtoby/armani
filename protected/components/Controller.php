<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	protected $signPackage = array(
		'appid'=>'wxc2efec250f2952a3', // 应用唯一标识，在微信开放平台提交应用审核通过后获得
		'secret'=>'234rdsfa',//应用密钥AppSecret，在微信开放平台提交应用审核通过后获得
		'grant_type'=>'authorization_code',//固定
		'code'=>'SDFERWE3w3erw',
		'timestamp'=>23,
		'nonceStr'=>23,
		'signature'=>23,
	);
	private $appid = '3234234';
	private $secret = 'adfasdfasdf';
	private $jsapiTicket;
	private $access_token;
	private $uid;
	
	/*public function filters(){
		return array('checkUser');
	}*/
	
	public function beforeAction($action)
	{
		$webUri = Yii::app()->request->baseUrl;
		
		Data::$data['staticUri'] = array(
			'css' => $webUri.'/public/css/',
			'js' => $webUri.'/public/js/',
		);
		
		return $action;
	}
	//http://armani2014.ccegroup.cn/ArmaniGetSignaturePara.ashx?Token=3808053
	
	public function filterCheckUser($filterChain)
	{
		$controller = $this->id;
        $action = $this->action->id;
		//site/error 直接通过
		if(in_array($controller,array('index')) && in_array($action,array('error'))){
			$filterChain->run();
			return true;
		}else{
			//没有session,或者session过期
			if(empty($_SESSION['user'])){  
				if(Yii::app()->request->isAjaxRequest){
					$this->jsonError(array(),'验证过期，请重新登陆！');
				}else{
					if(isset($_GET['code'])){//是否带有code
						$wc = new WeiChat($this->appid,$this->secret,$_GET['code']);
						$info = $wc->getSignPackage();
						if($info){
							$_SESSION['user'] = $info;
							$this->jsapiTicket = $info['access']['jsapi_ticket'];
							$this->saveUserInfo($info['userinfo']);
							$this->setSignatureString();
						}else{
							$this->redirect('/index/error');
						}
						$filterChain->run();
						return true;
					}else{//没有session & code
						$this->redirect('/index/error');
					} 
				}
			}else{  
				//print_r($_SESSION['user']);  
				if($_SESSION['user']['expire_time'] < time()){//自动登录过期
					if(Yii::app()->request->isAjaxRequest){
						$this->jsonError(array(),'验证过期，请重新登陆！');
					}else{
						//$this->redirect('http://www.baidu.com');
					}
				}else{
					$this->jsapiTicket = $_SESSION['user']['access']['jsapi_ticket'];
					$this->setSignatureString();
					$this->uid = $_SESSION['uid'];
				}
				$filterChain->run();
				return true;
			}  
		}
		
	}
	
	protected function saveUserInfo($info){
		$user = User::model()->findByAttributes(array(
			'unionid'=>$info['unionid']
		));
		if(count($user)){
			$user->updateTime = date("Y-m-d H:i:s");
		}else{
			$user = new User();
			$user->nickname = $info['nickname'];
			$user->sex = $info['sex'];
			$user->unionid = $info['unionid'];
			$user->headimgurl = $info['headimgurl'];
			$user->createTime = date("Y-m-d H:i:s");
			$user->updateTime = date("Y-m-d H:i:s");
		}
		$user->save();
		$this->uid = $user->id;
		 $_SESSION['uid'] = $this->uid;
	}
	
	protected function setSignatureString(){
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$timestamp = time();
		$nonceStr = $this->createNonceStr();
		$string = "jsapi_ticket=$this->jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
		$signature = sha1($string);
		
	    $this->signPackage = array(
		  "appId"     => $this->appId,
		  "nonceStr"  => $nonceStr,
		  "timestamp" => $timestamp,
		  "url"       => $url,
		  "signature" => $signature
		);
	}
	 
	private function createNonceStr($length = 16) {
	  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	  $str = "";
	  for ($i = 0; $i < $length; $i++) {
		$str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	  }
	  return $str;
	}
	
	protected function jsonSuccess($data, $params = array())
	{
		$data = array('code'=>200,'message'=>'操作成功','data'=>$data);
		$data = array_merge($data, $params);
		echo CJSON::encode($data);
		exit;
	}
	protected function jsonError($data,$message, $params = array())
	{
		$data = array('code'=>201,'message'=>$message,'data'=>$data);
		$data = array_merge($data, $params);
		echo CJSON::encode($data);
		exit;
	}
}