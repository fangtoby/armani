<?php
/* @var $this LotteryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lotteries',
);

$this->menu=array(
	array('label'=>'Create Lottery', 'url'=>array('create')),
	array('label'=>'Manage Lottery', 'url'=>array('admin')),
);
?>

<h1>Lotteries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
