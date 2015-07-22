<?php

class ApiController extends Controller
{
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
	/**
	 * 客户信息录入
	 */
	public function actionAddaddress()
	{	
		//$id = $this->uid;
		$id = 3;
		$code = 0;
		$cityId = $_GET['cityId'];
		$marketId = $_GET['marketId'];
		
		if(is_numeric($cityId) && is_numeric($marketId) && 
		isset($cityId) && isset($marketId)){ 
			$code = 1;
			$model = User::model()->findByPk($id);
			$model->cityId = $cityId;
			$model->marketId = $marketId;
			if($model->save()){
				$this->jsonSuccess(array(
					'code'=>$code
					));
			}
		}
		$this->jsonError(array(
			'code'=>$code
		),'参数错误');
	}
}
