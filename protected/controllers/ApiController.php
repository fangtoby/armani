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
	 
	public function actionAddinfo()
	{	
		//$id = $this->uid;
		$id = 3;
		$code = 0;
		$cityId = $_GET['cityId'];
		$marketId = $_GET['marketId'];
		//$opendId = $_SESSION["openid"];
		$opendId = "oPV4Ht7hM8LFcOB2LT8CAtTe1nw0";
		$type = $_GET['type'];
		$number = $_GET['phone'];
		
		if(!is_numeric($cityId) ||  !is_numeric($marketId) || 
		!isset($cityId) || !isset($marketId)){ 
			$this->jsonError(array(
				'code'=>$code
			),'地址或门店不能为空');	
		}
		
		if(isset($number) && preg_match("/1[3458]{1}\d{9}$/",$number)){ 
			$code = 1;
			
			$model = Lottery::model()->findByAttributes(array(
				'phone'=>$number,
				'type'=>$type,
				'marketId'=>$marketId
			));
			
			if(!$model){
				$model = new Lottery();
				$model->phone = $number;
				$model->cityId = $cityId;
				$model->marketId = $marketId;
				$model->createTime = date("Y-m-d H:i:s");
				$model->updateTime = date("Y-m-d H:i:s");
				$model->type = $type;
				$model->win = 0;
				
				if($model->save()){
					$this->jsonSuccess(array(
						'code'=>$code
						));
				}else{
					$code = 2;
					$this->jsonError(array(
						'code'=>$code
					),'保存错误');
				}
			}else{
				$code = 3;
				$this->jsonError(array(
					'code'=>$code
				),'重复中奖限制');	
			}
		}else{
			$this->jsonError(array(
				'code'=>$code
			),'手机号码格式错误');	
		}
		
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
	/*
	*	商店列表数据录入
	*/
	public function actionAddShopInfo(){
		$cid = $_GET['CityID'];
		$City = City::model()->findByPk($cid);
		
		if(!$City){
			$city = new City();
			$city->CityID = $cid;
			$city->CityName = $_GET['CityName'];
			$city->save();
		}
		
		$sid = $_GET['ShopID'];
		$Market = Market::model()->findByPk($sid);
		
		if(!$Market){
			$Market = new Market();
			$Market->ShopID = $sid;
			$Market->CityID = $cid;
			$Market->CounterManager = $_GET['CounterManager'];
			$Market->DirectorName = $_GET['DirectorName'];
			$Market->ShopAddress = $_GET['ShopAddress'];
			$Market->ShopCode = $_GET['ShopCode'];
			$Market->ShopEmail = $_GET['ShopEmail'];
			$Market->ShopLocation_X = $_GET['ShopLocation_X'];
			$Market->ShopLocation_Y = $_GET['ShopLocation_Y'];
			$Market->ShopName = $_GET['ShopName'];
			$Market->ShopPhone = $_GET['ShopPhone'];
			$Market->save();
		}
		return $sid;
	}
}
