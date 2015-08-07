<?php
/* @var $this MarketController */
/* @var $model Market */

$this->breadcrumbs=array(
	'Markets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'管理页面', 'url'=>array('admin')),
);
?>

<h1>Create Market</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'city'=>$city)); ?>