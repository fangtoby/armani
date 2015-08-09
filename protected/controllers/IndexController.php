<?php

class IndexController extends Controller
{
	protected $result = 1;
	
	public function actionIndex()
	{
		if(isset($_GET['info']) && $_GET['info'] !=  NULL){
			$info = CJSON::decode($_GET['info']);
			
			$user = User::model()->findAllByAttributes(array(
				'unionid'=>$info['openid']
			));
			
			//$_SESSION["openid"] = $info['openid'];
			
			if(!$user){
				$user = new User();
				$user->unionid = $info['openid'];
				
				$tmpStr = json_encode($info['nickname']); //暴露出unicode 
				$tmpStr = preg_replace("#(\\\ue[0-9a-f]{3})#ie","addslashes('\\1')",$tmpStr); //将emoji的unicode留下，其他不动 
				$nickname = json_decode($tmpStr); 
		
				$user->nickname = $nickname;
				
				//$text = preg_replace("#\\\u([0-9a-f]+)#ie","iconv('UCS-2','UTF-8', pack('H4', '\\1'))",$text); //对emoji unicode进行二进制pack并转utf8 
				
				$user->sex = $info['sex'];
				$user->headimgurl = $info['headimgurl'];
				$user->save();
			}
			
			//Yii::app()->session['uid'] = $user->id;
			
			$this->render('list',array(
				'signPackage'=>$this->signPackage,
				'result'=>$this->result,
				'url'=>Yii::app()->params['severUrl'],
				'info'=>$info
			));
			
		}else{
			$id = Yii::app()->params['weichat']['id'];
			$appId = Yii::app()->params['weichat']['appId'];
			$domain = Yii::app()->params['weichat']['domain'];
			$link = Yii::app()->params['severUrl'];
			
			$ulink =  urlencode("http://{$domain}/External/Oauth.ashx?link={$link}&id={$id}");
			
			$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appId}&redirect_uri={$ulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";
	
			$this->render('index',array(
				'signPackage'=>$this->signPackage,
				'url'=>$url
			));
		}
	}
	
	public function actionList()
	{
		//$info = $_GET['info'];
		
		$models = Product::model()->findAll();
		$data = array();
		
		foreach($models as $model){
			$data[] = $model->attributes;
		}
		/*$result= array_map(function($record){ 
			return $record->attributes; 
		},$models);
		*/
		$this->render('list',array(
			'signPackage'=>$this->signPackage,
			'result'=>$this->result,
			'data'=>$data,
			//'info'=>$info
		));
		
	}
	
	public function actionDetail()
	{
		$pid = isset($_GET['pid']) ? $_GET['pid']:1;
		/*
		$models = Detail::model()->findAllByAttributes(array(
			'pid'=>$pid
		));
		
		$data = array();
		
		foreach($item as $models){
			$data[] = $model->attributes;
		}
		
		if(!$models) $this->result = 0;
		*/
		$this->render('detail',array(
			'pid'=>$pid
		));
		
	}
	
	public function actionShare()
	{
		if(isset($_GET['openid'])){
			$openid = $_GET['openid'];
			
			$user = User::model()->findByAttributes(array(
					'unionid'=>$openid
				));
			if(count($user)){
				$this->render('share',array(
					'signPackage'=>$this->signPackage,
					'nickname'=>$user->nickname,
					'headimgurl'=>$user->headimgurl,
				));
			}
			
		}
		
	}
	
	/*
	*	申请粉底
	*/
	
	public function actionApply()
	{
		$City = City::model()->findAll();
		$Market = Market::model()->findAll();
		
		$this->render('apply',array(
			'signPackage'=>$this->signPackage,
			'city'=>$City,
			'market'=>$Market
		));
	}
	
	public function actionContact()
	{
		$this->render('contact',array(
			'signPackage'=>$this->signPackage,
		));
	}
	
	public function actionFollow()
	{
		$pid = isset($_GET['pid']) ? $_GET['pid']:1;
		$did = isset($_GET['did']) ? $_GET['did']:1;
		$this->render('follow',array(
			'signPackage'=>$this->signPackage,
			'pid'=>$pid,
			'did'=>$did
		));
	}
	
	public function actionAddress()
	{
		$this->render('address',array(
			'signPackage'=>$this->signPackage,
		));
	}
	public function actionError()
	{
		$this->render('Error');
	}
}