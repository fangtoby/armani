<?php
/* @var $this MarketController */
/* @var $model Market */

$this->breadcrumbs=array(
	'Markets'=>array('index'),
	$model->ShopID=>array('view','id'=>$model->ShopID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Market', 'url'=>array('index')),
	array('label'=>'Create Market', 'url'=>array('create')),
	array('label'=>'View Market', 'url'=>array('view', 'id'=>$model->ShopID)),
	array('label'=>'Manage Market', 'url'=>array('admin')),
);
?>

<h1>Update Market <?php echo $model->ShopID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>