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

<h1>中奖信息详情 - <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uid',
		'phone',
		  array(
		  'name'=>'cityId',
		  'value'=> $this->_gtCityName($model->cityId) ,  //这里显示图片
		  'type'=>'raw', 
		  ),
		  array(
		  'name'=>'marketId',
		  'value'=> $this->_getMarketName($model->marketId) ,  //这里显示图片
		  'type'=>'raw', 
		  ),
		  array(
		  'name'=>'type',
		  'value'=> $this->_getTypeName($model->type) ,  //这里显示图片
		  'type'=>'raw', 
		  ),
		'createTime',
		'updateTime',
		  array(
		  'name'=>'win',
		  'value'=> $this->_getWinName($model->win) ,  //这里显示图片
		  'type'=>'raw', 
		  ),
	),
)); ?>
