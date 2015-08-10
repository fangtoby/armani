<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	$model->CityID,
);

$this->menu=array(
	array('label'=>'添加', 'url'=>array('create')),
	array('label'=>'更新', 'url'=>array('update', 'id'=>$model->CityID)),
	array('label'=>'删除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CityID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理', 'url'=>array('admin')),
);
?>

<h1>地区详情 - <?php echo $model->CityID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CityID',
		'CityName',
	),
)); ?>
