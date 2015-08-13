<?php

class IndexController extends Controller
{
	protected $result = 1;
	
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
			
			$this->redirect(array('/index/list','id'=>$user->id));
			
		}else{
			echo "Autho Error";	
		}
	}
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
				'result'=>$this->result,
				'url'=>Yii::app()->params['severUrl'],
				'info'=>array(
					'openid'=>$user->id,
					'nickname'=>json_decode($user->nickname),
					'headimgurl'=>$user->headimgurl,
				)
			));
			
		}else{
			$wxlink = Yii::app()->params['severWxUrl'];
			$wxid = Yii::app()->params['weichat']['id'];
			$wxappId = Yii::app()->params['weichat']['appId'];
			$wxdomain = Yii::app()->params['weichat']['domain'];
			$wxulink =  urlencode("http://{$wxdomain}/External/Oauth.ashx?link={$wxlink}&id={$wxid}");
			$wxurl="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$wxappId}&redirect_uri={$wxulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";
			
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
			$link = Yii::app()->params['severWxUrl'];
			
			$wxid = Yii::app()->params['weichat']['id'];
			$wxappId = Yii::app()->params['weichat']['appId'];
			$wxdomain = Yii::app()->params['weichat']['domain'];
			$wxulink =  urlencode("http://{$wxdomain}/External/Oauth.ashx?link={$link}&id={$wxid}");
			$wxurl="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$wxappId}&redirect_uri={$wxulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";
			
			$wbid = "3163304423";
			$wblink = "http://masterofglow.comeyes.cn/autho.php";
			$wburl = "https://api.weibo.com/oauth2/authorize?client_id={$id}&response_type=code&redirect_uri={$link}";
			
			$this->render('index',array(
				'url'=>$url
			));
		}
	}
	
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
	
	public function actionShare()
	{
		if(isset($_GET['openid'])){
			$openid = $_GET['openid'];
			
			$user = User::model()->findByPk($openid);
			if(count($user)){
				$this->render('share',array(
						'number'=>$user->id,
						'info'=>array(
							'openid'=>$user->id,
							'nickname'=>json_encode($user->nickname),
							'headimgurl'=>$user->headimgurl,
					)
				));
			}
			
		}
	}
	public function actionDetail(){
		/*if(isset($_GET['openid'])){
			$openid = $_GET['openid'];
			
			$user = User::model()->findByAttributes(array(
					'unionid'=>$openid
				));
			$nickname = preg_replace("#\\\u([0-9a-f]+)#ie","iconv('UCS-2','UTF-8', pack('H4', '\\1'))",$user->nickname); //对emoji unicode进行二进制pack并转utf8 
			if(count($user)){
				$this->render('detail',array(
						'number'=>$user->id,
						'info'=>array(
							'openid'=>$user->id,
							'nickname'=>$nickname,
							'headimgurl'=>$user->headimgurl,
					)
				));
			}
			
		}*/
		$this->render('detail');
	}
}