<?php
/* @var $this PrizeController */
/* @var $model Prize */

$this->breadcrumbs=array(
	'Prizes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'添加奖品', 'url'=>array('create')),
	array('label'=>'奖品详情', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'奖品管理', 'url'=>array('admin')),
);
?>

<h1>更新奖品信息</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>