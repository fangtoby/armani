<?php
/* @var $this MarketController */
/* @var $model Market */

$this->breadcrumbs=array(
	'Markets'=>array('index'),
	$model->ShopID=>array('view','id'=>$model->ShopID),
	'Update',
);

$this->menu=array(
	array('label'=>'添加店铺', 'url'=>array('create')),
	array('label'=>'删除该店铺', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ShopID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理页面', 'url'=>array('admin')),
	
);
?>

<h1>编辑门店 - （<?php echo $model->ShopName; ?>）</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'city'=>$city)); ?>