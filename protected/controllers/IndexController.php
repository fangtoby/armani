<?php

class IndexController extends Controller
{
	protected $result = 1;

	protected $path = array(
			'wx'=>1,
			'wb'=>2,
		);

	//微博认证返回链接,收集用户信息
	public function actionAutho(){
		if(isset($_GET['info']) && $_GET['info'] !=  NULL){
			$info = CJSON::decode($_GET['info']);
			$user = User::model()->findByAttributes(array(
				'unionid'=>$info['openid']
			));
			$today = $this->getCurrectDate();
			
			if(!$user){
				$user = new User();
				$user->unionid = $info['openid'];
				$nickname = json_encode($info['nickname']);
				$user->nickname = $nickname;
				$user->sex = $info['sex'];
				$user->path = $this->path['wx'];
				$user->headimgurl = $info['headimgurl'];
				$user->createTime = $today;
				$user->updateTime = $today;
				$user->login_times = 1;
				$user->save();
			}else{
				$user->headimgurl = $info['headimgurl'];
				$user->updateTime = $today;
				$user->login_times += 1;
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
					'count'=>$user->getAllUserCount(),
					'nickname'=>json_decode($user->nickname),
					'headimgurl'=>$user->headimgurl,
				)
			));
			
		}else{
			$wxlink = Yii::app()->params['severWxUrl'];
			$wxid = Yii::app()->params['weichat']['id'];
			$wxappId = Yii::app()->params['weichat']['appId'];
			$wxdomain = Yii::app()->params['weichat']['domain'];
			
			$wxulink =  urlencode("http://{$wxdomain}/Service/Oauth.ashx?link={$wxlink}&id={$wxid}&params=");
			$wxOpenApi = "https://open.weixin.qq.com/connect/oauth2/authorize";
			$wxurl="{$wxOpenApi}?appid={$wxappId}&redirect_uri={$wxulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";
			
			$wblink = Yii::app()->params['severWbUrl'];
			$wbid =Yii::app()->params['weibo']['id'];
			$wburl = "https://api.weibo.com/oauth2/authorize?client_id={$wbid}&response_type=code&redirect_uri={$wblink}";
			
			$this->render('index',array(
				'url'=>array(
					'wx'=>$wxurl,
					'wb'=>$wburl
				)
			));
		}
	}
	
	public function actionIndexs()
	{
		//var_dump($_GET);
		//var_dump(json_decode($_GET['info']));
		//exit;

		if(isset($_GET['openid']) && $_GET['openid'] !=  NULL){
			$info = $_GET;

			$user = User::model()->findByAttributes(array(
				'unionid'=>$info['openid']
			));
			$today = $this->getCurrectDate();
			
			//$referer = $info['referer'];
			
			if(!$user){
				$user = new User();
				$user->unionid = $info['openid'];
				$nickname = json_encode($info['nickname']);
				$user->nickname = $nickname; 
				$user->path = $this->path['wb'];
				//$user->utm_source = $referer;
				$user->sex = $info['sex'];
				$user->headimgurl = $info['headimgurl'];
				$user->createTime = $today;
				$user->updateTime = $today;
				$user->login_times = 1;
				$user->save();
			}else{
				$user->headimgurl = $info['headimgurl'];
				$user->updateTime = $today;
				$user->login_times += 1;
				$user->save();
			}
			
			Yii::app()->session['uid'] = $user->id;
			
			$this->render('list',array(
				'result'=>$this->result,
				'url'=>Yii::app()->params['severWbUrl'],
				'info'=>array(
					'openid'=>$user->id,
					'count'=>$user->getAllUserCount(),
					'nickname'=>json_decode($user->nickname),
					'headimgurl'=>$user->headimgurl,
				)
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
					'count'=>$user->getAllUserCount(),
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
					'count'=>$user->getAllUserCount(),
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
							'count'=>$user->getAllUserCount(),
							'nickname'=>json_decode($user->nickname),
							'headimgurl'=>$user->headimgurl,
					)
				));
			}
		}
	}
	public function actionDetail(){
		$this->render('apply');
	}
}