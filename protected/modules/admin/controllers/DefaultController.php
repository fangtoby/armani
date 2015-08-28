<?php

class DefaultController extends Controller
{
	  public function Get_Ip_Addr(){
		  if(!empty($_SERVER["HTTP_CLIENT_IP"])){   
			  $ip = $_SERVER["HTTP_CLIENT_IP"];
		  }
		  if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ //获取代理ip
			  $ips = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
		  }
		  if($ip){
			  $ips = array_unshift($ips,$ip); 
		  }
		  $count = count($ips);
		  for($i=0;$i<$count;$i++){   
			  if(!preg_match("/^(10|172\.16|192\.168)\./i",$ips[$i])){//排除局域网ip
				  $ip = $ips[$i];
				  break;    
			  }  
		  }  
		  $tip = empty($_SERVER['REMOTE_ADDR']) ? $ip : $_SERVER['REMOTE_ADDR']; 
		  if($tip=="127.0.0.1"){ //获得本地真实IP
			  return self::get_onlineip();   
		  }
		  else{
			  return $tip; 
		  }
	}
	public function actionIndex()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$id = Yii::app()->admin->id;
				$admin = Admin::model()->findByPk( $id );
				$admin->loginTimes += 1;
				$admin->save();
				$log = new Adminlog();
				$log->createTime = date('Y-m-d H:i:s');
				$log->aid = $id;
				$log->ip = $this->Get_Ip_Addr();
				$log->save();
				
				$_SESSION['can_download'] = 1;
				$this->redirect("/admin/market/admin");
			}
		}
		// display the login form
		$this->render('index',array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->admin->logout();
		$this->redirect("/admin/default/index");
	}
	
	public function actionPassword(){
		$this->render('password');
	}
	
	public function actionModifyPassword(){
		$oldPassword = $_GET['oldPwd'];	
		$newPassword = $_GET['newPwd'];	//
		$id = Yii::app()->admin->id;
		
		$admin = Admin::model()->findByPk( $id );
		
		if(hash('sha256', $oldPassword) === $admin->password){
			
			$admin->password = hash('sha256', $newPassword);
			$admin->save();
			echo CJSON::encode(array(
				'type'=>1
			));	
		}else{
			echo CJSON::encode(array(
				'type'=>0
			));	
		}
	}
}