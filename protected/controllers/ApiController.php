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
	 * 抽奖
	 *	code 1 中奖
	 *	code 2 没中奖
	 *	code 3 重复抽奖限制
	 *	code 4 手机号码格式错误
	 *	code 5 地址门店不能为空
	 */
	 
	public function actionLottery()
	{	
		//$id = $this->uid;
		$code = array(
			'lucky'=>1,
			'sad'=>2,
			'lock'=>3,
			'format'=>4,
			'empty'=>5
		);
		
		$cityId = $_GET['cityId'];
		$marketId = $_GET['marketId'];
		//$opendId = $_SESSION["openid"];
		$opendId = "oPV4Ht7hM8LFcOB2LT8CAtTe1nw0";
		$type = $_GET['type'];
		$number = $_GET['phone'];
		
		if(!is_numeric($cityId) ||  !is_numeric($marketId) || 
		!isset($cityId) || !isset($marketId)){ 
			$this->jsonSuccess(array(
				'type'=>$code['empty']
			));	
		}
		
		if(isset($number) && preg_match("/1[3458]{1}\d{9}$/",$number)){ 
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
						'type'=>$code['lucky']
						));
				}else{
					$this->jsonSuccess(array(
						'type'=>$code['sad']
					));
				}
			}else{
				$code = 3;
				$this->jsonSuccess(array(
						'type'=>$code['lock']
				));	
			}
		}else{
			$this->jsonSuccess(array(
				'type'=>$code['format']
			));	
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
