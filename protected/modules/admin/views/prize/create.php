<?php
/* @var $this PrizeController */
/* @var $model Prize */

$this->breadcrumbs=array(
	'Prizes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'奖品管理', 'url'=>array('admin')),
);
?>

<h1>添加奖品</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>