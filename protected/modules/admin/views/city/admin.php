<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'添加地区', 'url'=>array('create')),
);

?>

<h1>地区管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'city-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'CityID',
		'CityName',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
