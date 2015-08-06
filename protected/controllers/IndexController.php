<?php

class IndexController extends Controller
{
	protected $result = 1;
	
	public function actionIndex()
	{
		if(isset($_GET['info']) && $_GET['info'] !=  NULL){
			$info = CJSON::decode($_GET['info']);
			
			$model = User::model()->findAllByAttributes(array(
				'unionid'=>$info['openid']
			));
			
			//$_SESSION["openid"] = $info['openid'];
			
			if(!$model){
				$user = new User();
				$user->unionid = $info['openid'];
				$user->nickname = $info['nickname'];
				$user->sex = $info['sex'];
				$user->headimgurl = $info['headimgurl'];
				$user->save();
			}else{
				/*$model->unionid = $info['openid'];
				$model->nickname = $info['nickname'];
				$model->sex = $info['sex'];
				$model->headimgurl = $info['headimgurl'];
				$model->save();*/
			}
			
			$models = Product::model()->findAll();
			
			$data = array();
			
			foreach($models as $model){
				$data[] = $model->attributes;
			}
			$this->render('list',array(
				'signPackage'=>$this->signPackage,
				'result'=>$this->result,
				'data'=>$data,
				'info'=>$info
			));
			
		}else{
			$id = "7";
			$appId = "wxc2efec250f2952a3";
			$domain = "wxresponse.comeyes.com";
			$link ="http://masterofglow.comeyes.cn";
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
		$pid = isset($_GET['pid']) ? $_GET['pid']:1;
		$did = isset($_GET['did']) ? $_GET['did']:1;
		
		$user = User::model()->findByPk( 3/*$this->uid*/ );
		
		if($user){
			$user->product_id = $pid;
			$user->detail_id = $did;
			$user->save();
		}
		
		$this->render('share',array(
			'signPackage'=>$this->signPackage,
		));
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