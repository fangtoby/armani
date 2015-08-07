<?php
/* @var $this LotteryController */
/* @var $model Lottery */

$this->breadcrumbs=array(
	'Lotteries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lottery', 'url'=>array('index')),
	array('label'=>'Create Lottery', 'url'=>array('create')),
	array('label'=>'View Lottery', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lottery', 'url'=>array('admin')),
);
?>

<h1>Update Lottery <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>