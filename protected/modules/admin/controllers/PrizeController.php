<?php

class PrizeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Prize;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Prize']))
		{
			$model->attributes=$_POST['Prize'];
			$model->createTime = date("Y-m-d H:i:s");
			$model->updateTime = date("Y-m-d H:i:s");
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Prize']))
		{
			$model->attributes=$_POST['Prize'];
			$model->updateTime = date("Y-m-d H:i:s");
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		
		$model->isDel = 1;
		$model->save();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Prize');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Prize('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Prize']))
			$model->attributes=$_GET['Prize'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Prize the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Prize::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Prize $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prize-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public $prizeType  =  array(
			0=>"普通奖品",
			1=>"特别奖品",
			2=>"正装大奖"
		);
	public function getTypeName($data,$row){
		echo isset($this->prizeType[ $data->type ])? $this->prizeType[ $data->type ]:"";
	}
	
	public function getTempleButton($data,$row){
		if($data->type == $this->prizeType[2]){
			echo '{view}';	
		}else{
			echo '{view} {update} {delete}';	
		}
	}
	
	public function getJugementStart($data,$row){
		echo $this->jugementStart();
	}
	
	public function jugementStart($model){
		$now = time();
		$status = array(
			0=>"未开始",
			1=>"进行中",
			2=>"结束",
			3=>"未设定",
			4=>"派发完"
		);
		if($model->number === $model->count){
			return $status[4];
		}
		if($model->endTime && $model->startTime){
			if($now < strtotime($model->endTime) && $now > strtotime($model->startTime)){
				return $status[1];
			}
			if($now < strtotime($model->startTime)){
				return $status[0];	
			}
			return $status[2];
		}
		return $status[3];
		
	}
}
