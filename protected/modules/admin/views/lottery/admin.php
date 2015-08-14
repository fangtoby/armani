<?php
/* @var $this LotteryController */
/* @var $model Lottery */

$this->breadcrumbs=array(
	'Lotteries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Lottery', 'url'=>array('index'))
);

?>

<h1>中奖记录</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lottery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*'id',
		'uid',*/
		'phone',
		array(
            'name'=>'cityId',
            'type'=>'raw',
            'value'=> array($this,'getCityName'),   //调用自定义的函数
        ),  
		array(
            'name'=>'marketId',
            'type'=>'raw',
            'value'=> array($this,'getMarketName'),   //调用自定义的函数
        ),  
		array(
            'name'=>'type',
            'type'=>'raw',
            'value'=> array($this,'getTypeName'),   //调用自定义的函数
        ),
		'createTime',
		array(
            'name'=>'win',
            'type'=>'raw',
            'value'=> array($this,'getWinName'),   //调用自定义的函数
        ),  
		array(
            'name'=>'giftId',
            'type'=>'raw',
            'value'=> array($this,'getGiftName'),   //调用自定义的函数
        ),
        array(  
            'name'=>'username',  
            'value'=>'$data->user->nickname',  //定义展示的 value 值  
           // 'filter'=>CHtml::activeTextField($model,'name'), //添加搜索 filter  
        ),  
        array(  
            'name'=>'path',  
            'value'=>'$data->user->path',  //定义展示的 value 值  
            //'filter'=>CHtml::activeTextField($model,'name'), //添加搜索 filter  
        ), 
		array(
		'header'=>'操作',
		'class'=>'CButtonColumn',
		'headerHtmlOptions'=>array(
			'width'=>'80',
		),
		'template'=>'{view}', 
		),
	),
)); ?>
