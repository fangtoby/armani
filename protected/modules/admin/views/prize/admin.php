<?php
/* @var $this PrizeController */
/* @var $model Prize */

$this->breadcrumbs=array(
	'Prizes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Prize', 'url'=>array('index')),
	array('label'=>'Create Prize', 'url'=>array('create')),
);


?>

<h1>奖品管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prize-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'note',
		'count',
		'number',
		'rate',
		/*
		'type',
		'startTime',
		'endTime',
		'createTime',
		'updateTime',
		'isDel',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
