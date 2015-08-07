<?php
/* @var $this MarketController */
/* @var $model Market */

$this->breadcrumbs=array(
	'Markets'=>array('index'),
	$model->ShopID,
);

$this->menu=array(
	array('label'=>'添加店铺', 'url'=>array('create')),
	array('label'=>'更新店铺', 'url'=>array('update', 'id'=>$model->ShopID)),
	array('label'=>'删除该店铺', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ShopID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理页面', 'url'=>array('admin')),
);
?>

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
