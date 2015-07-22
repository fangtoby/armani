<?php

class IndexController extends Controller
{
	public function actionIndex()
	{
		
		$this->render('index',array(
			'signPackage'=>$this->signPackage,
		));
	}
	
	public function actionList()
	{
		$this->render('list',array(
			'signPackage'=>$this->signPackage,
		));
	}
	
	public function actionDetail()
	{
		$this->render('detail',array(
			'signPackage'=>$this->signPackage,
		));
	}
	
	public function actionShare()
	{
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