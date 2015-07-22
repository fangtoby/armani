<?php

class IndexController extends Controller
{
	public function actionIndex()
	{
		/*$code = $this->signPackage['code'];
		$appid = $this->signPackage['appid'];
		$secret = $this->signPackage['secret'];
		$grant_type = $this->signPackage['grant_type'];
		
		if (empty($code)) $this->error('授权失败');
		
		$token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';
		$access_token = json_decode(file_get_contents($token_url));
		if (isset($token->errcode)) {
			echo '<h1>错误：</h1>'.$token->errcode;
			echo '<br/><h2>错误信息：</h2>'.$token->errmsg;
			exit;
		}
		
		$user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token->access_token.'&openid='.$access_token->openid.'&lang=zh_CN';
		//转成对象
		$user_info = json_decode(file_get_contents($user_info_url));
		if (isset($user_info->errcode)) {
			echo '<h1>错误：</h1>'.$user_info->errcode;
			echo '<br/><h2>错误信息：</h2>'.$user_info->errmsg;
			exit;
		}
		//打印用户信息
		echo '<pre>';
		print_r($user_info);
		echo '</pre>';
		*/
		$this->render('index',array(
			'signPackage'=>$this->signPackage,
		));
	}
	
	public function actionList()
	{
		$this->render('list',array(
			'signPackage'=>$this->signPackage,
		));
	}
	
	public function actionDetail()
	{
		$this->render('detail',array(
			'signPackage'=>$this->signPackage,
		));
	}
	
	public function actionShare()
	{
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