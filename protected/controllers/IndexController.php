<?php

class IndexController extends Controller
{
	protected $result = 1;
	//微博认证返回链接,收集用户信息
	public function actionAutho(){
		if(isset($_GET['info']) && $_GET['info'] !=  NULL){
			$info = CJSON::decode($_GET['info']);
			$user = User::model()->findByAttributes(array(
				'unionid'=>$info['openid']
			));
			if(!$user){
				$user = new User();
				$user->unionid = $info['openid'];
				$nickname = json_encode($info['nickname']);
				$user->nickname = $nickname;
				$user->sex = $info['sex'];
				$user->headimgurl = $info['headimgurl'];
				$user->save();
			}
			Yii::app()->session['uid'] = $user->id;
			//2015-08-13
			//bug: fix wb signature get error
			//note: armani sever bug, the request url code error
			$this->redirect(array('/index/list','id'=>$user->id));
		}else{
			echo "Autho Error";	
		}
	}
	//动画首页，提供验证跳转url
	public function actionIndex()
	{
		if(isset($_GET['info']) && $_GET['info'] !=  NULL){
			$info = CJSON::decode($_GET['info']);
			$user = User::model()->findByAttributes(array(
				'unionid'=>$info['openid']
			));
			if(!$user){
				$user = new User();
				$user->unionid = $info['openid'];
				$nickname = json_encode($info['nickname']);
				$user->nickname = $nickname;
				$user->sex = $info['sex'];
				$user->headimgurl = $info['headimgurl'];
				$user->save();
			}
			Yii::app()->session['uid'] = $user->id;
			$this->render('list',array(
				'url'=>Yii::app()->params['severUrl'],
				'info'=>array(
					'openid'=>$user->id,
					'nickname'=>json_decode($user->nickname),
					'headimgurl'=>$user->headimgurl,
				)
			));
			
		}else{
			$id = Yii::app()->params['weichat']['id'];
			$appId = Yii::app()->params['weichat']['appId'];
			$domain = Yii::app()->params['weichat']['domain'];
			$link = Yii::app()->params['severUrl'];
			//if(isset(Yii::app()->session['uid'])){
				//$url = "/index/list";
			//}else{
				$ulink =  urlencode("http://{$domain}/External/Oauth.ashx?link={$link}&id={$id}");
				$authorize = "https://open.weixin.qq.com/connect/oauth2/authorize";
				$url="{$authorize}?appid={$appId}&redirect_uri={$ulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";
			//}
			$this->render('index',array(
				'url'=>$url
			));
		}
	}
	
	public function actionIndexs()
	{
		$path = array(
			'wx'=>1,
			'wb'=>2,
		);
		
		$where = 1;

		if(isset($_GET['path'])){
			if($path['wx'] == $_GET['path']){
				$where = 1;
			}
			if($path['wb'] == $_GET['path']){
				$where = 2;
			}
		}

		if(isset($_GET['info']) && $_GET['info'] !=  NULL){
			$info = CJSON::decode($_GET['info']);
			
			$user = User::model()->findByAttributes(array(
				'unionid'=>$info['openid']
			));
			
			if($where == $path['wx']){
				$referer = $_SERVER['HTTP_REFERER'];
			}else{
				$referer = $info['referer'];
			}
			if(!$user){
				$user = new User();
				$user->unionid = $info['openid'];
				$nickname = json_encode($info['nickname']);
				$user->nickname = $nickname; 
				$user->path = $where;
				$user->utm_source = $referer;
				$user->sex = $info['sex'];
				$user->headimgurl = $info['headimgurl'];
				$user->save();
			}
			
			Yii::app()->session['uid'] = $user->id;
			
			$this->render('list',array(
				'result'=>$this->result,
				'url'=>Yii::app()->params['severUrl'],
				'info'=>array(
					'where'=>$where,
					'openid'=>$user->id,
					'nickname'=>json_decode($user->nickname),
					'headimgurl'=>$user->headimgurl,
				)
			));
			
		}else{
			$link = Yii::app()->params['severUrl'];
			if($where == $path['wx']){
				$id = Yii::app()->params['weichat']['id'];
				$appId = Yii::app()->params['weichat']['appId'];
				$domain = Yii::app()->params['weichat']['domain'];
				$ulink =  urlencode("http://{$domain}/External/Oauth.ashx?link={$link}&id={$id}");
				$authorizeDomin = "https://open.weixin.qq.com/connect/oauth2/authorize";
				$url="{$authorizeDomin}?appid={$appId}&redirect_uri={$ulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";
			}else if($where == $path['wb']){
				$id = "3163304423";
				$link = "http://masterofglow.comeyes.cn/autho.php";
				$authorize = "https://api.weibo.com/oauth2/authorize?client_id={$id}&response_type=code&redirect_uri={$link}";
				//$url = urlencode($authorize);
			}
			$this->render('index',array(
				'url'=>$url
			));
		}
	}
	//活动页面，所有的操作平台
	public function actionList(){
		if(isset($_GET['test'])){
			$uid = 15;
		}else{
			$uid = Yii::app()->session['uid'];
		}
		
		$user = User::model()->findByPk($uid);
		if(count($user)){
			$this->render('list',array(
				'url'=>Yii::app()->params['severUrl'],
				'info'=>array(
					'openid'=>$user->id,
					'nickname'=>json_decode($user->nickname),
					'headimgurl'=>$user->headimgurl,
				)
			));
		}
	}
	public function actionSetinfo()
	{
		if(isset($_GET['test'])){
			$uid = 15;
		}else{
			$uid = Yii::app()->session['uid'];
		}
		$user = User::model()->findByPk($uid);
		if(count($user)){
			$this->render('setinfo',array(
				'info'=>array(
					'openid'=>$user->id,
					'nickname'=>json_decode($user->nickname),
					'headimgurl'=>$user->headimgurl,
				)
			));
		}
		
	}
	//分享信息展示页面，任何人提供openid都可以访问
	public function actionShare()
	{
		if(isset($_GET['test'])){
			$uid = 15;
		}
		if(isset($_GET['openid'])){
			if(!isset($_GET['test'])){
				$uid = $_GET['openid'];
			}
			$user = User::model()->findByPk($uid);
			if(count($user)){
				$this->render('share',array(
						'number'=>$user->id,
						'info'=>array(
							'openid'=>$user->id,
							'nickname'=>json_decode($user->nickname),
							'headimgurl'=>$user->headimgurl,
					)
				));
			}
		}
	}
	public function actionDetail(){
		$this->render('detail');
	}
}