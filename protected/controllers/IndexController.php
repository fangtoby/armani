<?php

class IndexController extends Controller
{
	protected $result = 1;
	
	public function actionIndex()
	{
		$id = "7";
		$appId = "wxc2efec250f2952a3";
		$domain = "wxresponse.comeyes.com";
		$link ="http://masterofglow.comeyes.cn/index/list";
		$ulink =  urlencode("http://{$domain}/External/Oauth.ashx?link={$link}&id={$id}");
		
		$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appId}&redirect_uri={$ulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";

		$this->render('index',array(
			'signPackage'=>$this->signPackage,
			'url'=>$url
		));
	}
	
	public function actionList()
	{
		
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
			'data'=>$data
		));
		
	}
	
	public function actionDetail()
	{
		/*$pid = isset($_GET['pid']) ? $_GET['pid']:1;
		
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
			'signPackage'=>$this->signPackage,
			'pid'=>$pid,
			'result'=>$this->result,
			'data'=>$data
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
	
	public function actionContact()
	{
		$this->render('contact',array(
			'signPackage'=>$this->signPackage,
		));
	}
	
	public function actionFollow()
	{
		$this->render('follow',array(
			'signPackage'=>$this->signPackage,
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