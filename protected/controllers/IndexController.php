<?php

class IndexController extends Controller
{
	protected $result = 1;
	
	public function actionIndex()
	{
		$this->render('index',array(
			'signPackage'=>$this->signPackage,
		));
	}
	
	public function actionList()
	{
		$models = Product::model()->findAll();
		
		$result= array_map(function($record) { return $record->attributes;},$models);
		
		$this->render('list',array(
			'signPackage'=>$this->signPackage,
			'result'=>$this->result,
			'data'=>$result
		));
		
	}
	
	public function actionDetail()
	{
		$pid = isset($_GET['pid']) ? $_GET['pid']:1;
		
		$models = Detail::model()->findAllByAttributes(array(
			'pid'=>$pid
		));
		
		$result= array_map(function($record) { return $record->attributes;},$models);
		
		if(!$models) $this->result = 0;
		
		$this->render('detail',array(
			'signPackage'=>$this->signPackage,
			'pid'=>$pid,
			'result'=>$this->result,
			'data'=>$result
		));
		
	}
	
	public function actionShare()
	{
		$pid = isset($_GET['pid']) ? $_GET['pid']:1;
		$did = isset($_GET['did']) ? $_GET['did']:1;
		
		$user = User::model()->findByPk( 3/*$this->uid*/ );
		
		if($user){
			$user->product_id = $pid;
			$user->detail_id = $did;
			$user->save();
		}
		
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