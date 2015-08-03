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
		$pid = isset($_GET['pid']) ? $_GET['pid']:1;
		$this->render('detail',array(
			'signPackage'=>$this->signPackage,
			'pid'=>$pid
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