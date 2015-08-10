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

<h1>店铺信息详情 - <?php echo $model->ShopName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		  array(
		  'name'=>'状态',
		  'value'=> $this->jugementStart($model) ,  //这里显示图片
		  'type'=>'raw', 
		  ),
		'ShopID',
		  array(
		  'name'=>'CityID',
		  'value'=> $this->getDetailCityName($model->CityID) ,  //这里显示图片
		  'type'=>'raw', 
		  ),
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
