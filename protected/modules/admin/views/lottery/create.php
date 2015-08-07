<?php
/* @var $this LotteryController */
/* @var $model Lottery */

$this->breadcrumbs=array(
	'Lotteries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lottery', 'url'=>array('index')),
	array('label'=>'Manage Lottery', 'url'=>array('admin')),
);
?>

<h1>Create Lottery</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>