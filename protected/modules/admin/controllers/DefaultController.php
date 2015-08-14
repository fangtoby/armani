<?php

class DefaultController extends Controller
{
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
			if($model->validate() && $model->login())
				$this->redirect("/admin/market/admin");
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