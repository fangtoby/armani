<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'地区管理', 'url'=>array('admin')),
);
?>

<h1>添加地区</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>