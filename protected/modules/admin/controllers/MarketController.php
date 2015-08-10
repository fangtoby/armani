<?php

class MarketController extends Controller
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
			//'postOnly + delete', // we only allow deletion via POST request
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
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),*/
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
		$model=new Market;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Market']))
		{
			$model->attributes=$_POST['Market'];
			$model->createTime = date("Y-m-d H:i:s");
			$model->updateTime = date("Y-m-d H:i:s");
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->ShopID));
		}

		$this->render('create',array(
			'model'=>$model,
			'city'=>City::model()->findAll()
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

		if(isset($_POST['Market']))
		{
			$model->attributes=$_POST['Market'];
			$model->createTime = date("Y-m-d H:i:s");
			$model->updateTime = date("Y-m-d H:i:s");
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->ShopID));
		}

		$this->render('update',array(
			'model'=>$model,
			'city'=>City::model()->findAll()
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
		$dataProvider=new CActiveDataProvider('Market');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Market('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Market']))
			$model->attributes=$_GET['Market'];

		$this->render('admin',array(
			'model'=>$model,
			'city'=>City::model()->findAll()
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Market the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Market::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Market $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='market-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function getCityName($data,$row){
		$city = City::model()->findByPk($data->CityID );
		echo $city->CityName;
	}
	
	public function getDetailCityName($cityId){
		$city = City::model()->findByPk($cityId );
		return $city->CityName;
	}
	
	public function getJugementStart($data,$row){
		echo $this->jugementStart($data);
	}
	
	public function jugementStart($model){
		$now = time();
		$status = array(
			0=>"未开始",
			1=>"进行中",
			2=>"结束",
			3=>"未设定"
		);
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
