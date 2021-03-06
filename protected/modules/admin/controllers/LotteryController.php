<?php

class LotteryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

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
		$model=new Lottery;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Lottery']))
		{
			$model->attributes=$_POST['Lottery'];
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

		if(isset($_POST['Lottery']))
		{
			$model->attributes=$_POST['Lottery'];
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Lottery');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * 简单对称加密算法之加密
	 * @param String $string 需要加密的字串
	 * @param String $skey 加密EKY
	 * @author Anyon Zou <zoujingli@qq.com>
	 * @date 2013-08-13 19:30
	 * @update 2014-10-10 10:10
	 * @return String
	 */
	 public function encode($string = '', $skey = 'cxphp') {
	    $strArr = str_split(base64_encode($string));
	    $strCount = count($strArr);
	    foreach (str_split($skey) as $key => $value)
	        $key < $strCount && $strArr[$key].=$value;
	    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
	 }
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$string = "wrsd7903sdf*#dfasd/";
		$skey = "MASTER";

		$scode = $this->encode($string,$skey);

		$model=new Lottery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Lottery'])){
			$Search = $_GET['Lottery'];
			if(isset($Search['search'])){
				$model->search_endtime = $Search['search_endtime'];
				$model->search_starttime = $Search['search_starttime'];
			}
			$model->phone = isset($Search['phone']) ? $Search['phone']:NULL;
		}
		
		$this->render('admin',array(
			'model'=>$model,
			'code'=>$scode
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Lottery the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Lottery::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Lottery $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lottery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function getCityName($data,$row){
		echo $this->_gtCityName( $data->cityId );
	}
	
	public function _gtCityName($cityid){
		$city = City::model()->findByPk($cityid );
		return $city->CityName;
	}
	
	public function getMarketName($data,$row){
		echo $this->_getMarketName($data->marketId );
	}
	public function _getMarketName($marketId){
		$Market = Market::model()->findByPk($marketId );
		return $Market->ShopName;
	}
	
	public function getWinName($data,$row){
		echo $this->_getWinName( $data->win );
	}
	public function _getWinName($win){
		$type = array(
			0=>"否",
			1=>"是"
		);
		return $type[ $win ];
	}
	public function getTypeName($data,$row){
		echo $this->_getTypeName( $data->type );
	}
	public function _getTypeName($type){
		$types = array(
			0=>"普通奖品",
			1=>"特别奖品",
			2=>"正装大奖"
		);
		return isset($types[ $type ])? $types[ $type ]:"";
	}
	public function getGiftName($data,$row){
		$Prize = Prize::model()->findByPk($data->giftId );
		if($Prize){
			echo $Prize->name."-".$Prize->note;
		}
	}
	
}
