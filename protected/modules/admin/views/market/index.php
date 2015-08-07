<?php
/* @var $this MarketController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Markets',
);

$this->menu=array(
	array('label'=>'Create Market', 'url'=>array('create')),
	array('label'=>'Manage Market', 'url'=>array('admin')),
);
?>

<h1>Markets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
