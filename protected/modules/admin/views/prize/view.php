<?php
/* @var $this PrizeController */
/* @var $model Prize */

$this->breadcrumbs=array(
	'Prizes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'修改奖品信息', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除该奖品', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'添加奖品', 'url'=>array('create')),
	array('label'=>'奖品管理', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name; ?> - 详情</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		  array(
		  'name'=>'Status',
		  'value'=> $this->jugementStart($model) ,  //这里显示图片
		  'type'=>'raw', 
		  ),
		'id',
		'name',
		'note',
		'count',
		'number',
		'rate',
		'type',
		'startTime',
		'endTime',
		'hourNumber',
		'dayNumber',
		'createTime',
		'updateTime',
		'isDel',
	),
)); ?>
