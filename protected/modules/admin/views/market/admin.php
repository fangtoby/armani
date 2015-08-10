<?php
/* @var $this MarketController */
/* @var $model Market */

$this->breadcrumbs=array(
	'Markets'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>' + 添加店铺', 'url'=>array('create')),
);
//var_dump(Yii::app()->admin->name);
?>

<h1>店铺管理</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'market-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		 array(
		  'name'=>'Status',
		  'value'=> array($this,'getJugementStart'),  
		  'type'=>'raw', 
		 ),
		array(
			'name'=>'ShopID',
			'value'=>$model->ShopID,  
			'type'=>'raw',   
			'htmlOptions'=>array(
				'width'=>'50',
		)),
		array(
            'name'=>'CityID',
            'type'=>'raw',
            'value'=> array($this,'getCityName'), //调用自定义的函数
        ),        
		'ShopName',
		array(
			'name'=>'prize',
			'value'=>$model->prize,  
			'type'=>'raw',   
			'htmlOptions'=>array(
				'width'=>'50',
		)),
		array(
			'name'=>'count',
			'value'=>$model->count,  
			'type'=>'raw',   
			'htmlOptions'=>array(
				'width'=>'50',
		)),
		array(
			'name'=>'rate',
			'value'=>$model->rate,  
			'type'=>'raw',   
			'htmlOptions'=>array(
				'width'=>'50',
		)),
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
