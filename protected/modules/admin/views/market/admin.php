<?php
/* @var $this MarketController */
/* @var $model Market */

$this->breadcrumbs=array(
	'Markets'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'添加店铺', 'url'=>array('create')),
);

?>

<h1>店铺管理</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'market-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ShopID',
		array(
            'name'=>'CityID',
            'type'=>'raw',
            'value'=> array($this,'getCityName'),   //调用自定义的函数
        ),        
		'ShopName',
		'prize',
		'count',
		'rate',
		'startTime',
		'endTime',
		/*
		'ShopEmail',
		'ShopLocation_X',
		'ShopLocation_Y',
		'ShopPhone',
		'createTime',
		'updateTime',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
