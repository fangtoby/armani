<?php

class ApiController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','productlist','productdetail','addphone'),
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
			),
		);
	}
	/**
	 * 产品列表
	 */
	public function actionProductlist(){
		$models = Product::model()->findAll();
		$this->jsonSuccess($models);
	}
	/**
	 * 产品详情
	 */
	public function actionProductdetail($id)
	{
		$models = Detail::model()->findAllByAttributes(array(
			'pid'=>$id
		));
		$this->jsonSuccess($models);
	}
	/**
	 * 手机号码录入
	 *	code 1 输入成功
	 *	code 2 数据库错误
	 *	code 3 手机号码格式错误
	 */
	 
	public function actionAddphone($number)
	{	
		//$id = $this->uid;
		$id = 3;
		$code = 0;
		
		if(isset($number) && preg_match("/1[3458]{1}\d{9}$/",$number)){ 
			$code = 1;
			$model = User::model()->findByPk($id);
			$model->phone = $number;
			if($model->save()){
				$this->jsonSuccess(array(
					'code'=>$code
					));
			}else{
				$code = 2;
				$this->jsonError(array(
					'code'=>$code
				),'手机号码无法保存');
			}
		}
		$this->jsonError(array(
			'code'=>$code
		),'手机号码格式错误');
	}
}
