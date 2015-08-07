<?php
/* @var $this MarketController */
/* @var $model Market */

$this->breadcrumbs=array(
	'Markets'=>array('index'),
	$model->ShopID,
);

$this->menu=array(
	array('label'=>'List Market', 'url'=>array('index')),
	array('label'=>'Create Market', 'url'=>array('create')),
	array('label'=>'Update Market', 'url'=>array('update', 'id'=>$model->ShopID)),
	array('label'=>'Delete Market', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ShopID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Market', 'url'=>array('admin')),
);
?>

<h1>View Market #<?php echo $model->ShopID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ShopID',
		'CityID',
		'CounterManager',
		'DirectorName',
		'ShopAddress',
		'ShopCode',
		'ShopEmail',
		'ShopLocation_X',
		'ShopLocation_Y',
		'ShopName',
		'ShopPhone',
		'createTime',
		'updateTime',
		'prize',
		'count',
		'startTime',
		'endTime',
		'rate',
	),
)); ?>
