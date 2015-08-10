<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	$model->CityID=>array('view','id'=>$model->CityID),
	'Update',
);

$this->menu=array(
	array('label'=>'添加', 'url'=>array('create')),
	array('label'=>'详情', 'url'=>array('view', 'id'=>$model->CityID)),
	array('label'=>'删除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CityID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理', 'url'=>array('admin')),
);
?>

<h1>修改 - <?php echo $model->CityID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>