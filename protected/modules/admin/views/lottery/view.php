<?php
/* @var $this LotteryController */
/* @var $model Lottery */

$this->breadcrumbs=array(
	'Lotteries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Lottery', 'url'=>array('index')),
	array('label'=>'Create Lottery', 'url'=>array('create')),
	array('label'=>'Update Lottery', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lottery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lottery', 'url'=>array('admin')),
);
?>

<h1>View Lottery #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uid',
		'phone',
		'cityId',
		'marketId',
		'type',
		'createTime',
		'updateTime',
		'win',
	),
)); ?>
