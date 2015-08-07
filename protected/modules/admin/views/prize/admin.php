<?php
/* @var $this PrizeController */
/* @var $model Prize */

$this->breadcrumbs=array(
	'Prizes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'添加奖品', 'url'=>array('create')),
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
		'rate',
		'hourNumber',
		'dayNumber',
		array(
            'name'=>'type',
            'type'=>'raw',
            'value'=> array($this,'getTypeName'),   //调用自定义的函数
        ),
		'number',
		/*
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
