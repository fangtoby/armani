<?php

class IndexController extends Controller
{
	protected $result = 1;
	
	public function actionIndex()
	{
		if(isset($_GET['info']) && $_GET['info'] !=  NULL){
			$info = CJSON::decode($_GET['info']);
			
			$openid = 'oPV4Ht0yokB6n-DEcr5JocRNPZv4';
			
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
			$id = Yii::app()->params['weichat']['id'];
			$appId = Yii::app()->params['weichat']['appId'];
			$domain = Yii::app()->params['weichat']['domain'];
			$link = Yii::app()->params['severUrl'];
			
			$ulink =  urlencode("http://{$domain}/External/Oauth.ashx?link={$link}&id={$id}");
			
			$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appId}&redirect_uri={$ulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";
	
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
		
		$where = 0;
		if(isset($_GET['code'])){
			$code = $_GET['code'];
			echo $code;
			exit;
		}
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
			
			$openid = 'oPV4Ht0yokB6n-DEcr5JocRNPZv4';
			
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
			$link = Yii::app()->params['severUrl'];
			if($where == $path['wx']){
				$id = Yii::app()->params['weichat']['id'];
				$appId = Yii::app()->params['weichat']['appId'];
				$domain = Yii::app()->params['weichat']['domain'];
				$ulink =  urlencode("http://{$domain}/External/Oauth.ashx?link={$link}&id={$id}");
				$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appId}&redirect_uri={$ulink}&response_type=code&scope=snsapi_userinfo&state=State#wechat_redirect";
			}else if($where == $path['wb']){
				$id = "3163304423";
				$link = $link."/index/indexs";
				$authorize = "https://api.weibo.com/oauth2/authorize?client_id={$id}&response_type=code&redirect_uri={$link}";
				//$url = urlencode($authorize);
			}
			$this->render('index',array(
				'url'=>$url
			));
		}
	}
	
	public function actionList(){
		if(isset($_GET['test'])){
			$uid = 5;
		}else{
			$uid = Yii::app()->session['uid'];
		}
		
		$user = User::model()->findByPk($uid);
		if(count($user)){
			$this->render('list',array(
				'info'=>array(
					'openid'=>$user->id,
					'nickname'=>json_encode($user->nickname),
					'headimgurl'=>$user->headimgurl,
				)
			));
		}
	}
	public function actionSetinfo()
	{
		if(isset($_GET['test'])){
			$uid = 5;
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
			
			$user = User::model()->findByAttributes(array(
					'unionid'=>$openid
				));
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