<?php
/* @var $this MarketController */
/* @var $data Market */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShopID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ShopID), array('view', 'id'=>$data->ShopID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CityID')); ?>:</b>
	<?php echo CHtml::encode($data->CityID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CounterManager')); ?>:</b>
	<?php echo CHtml::encode($data->CounterManager); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DirectorName')); ?>:</b>
	<?php echo CHtml::encode($data->DirectorName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShopAddress')); ?>:</b>
	<?php echo CHtml::encode($data->ShopAddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShopCode')); ?>:</b>
	<?php echo CHtml::encode($data->ShopCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShopEmail')); ?>:</b>
	<?php echo CHtml::encode($data->ShopEmail); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ShopLocation_X')); ?>:</b>
	<?php echo CHtml::encode($data->ShopLocation_X); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShopLocation_Y')); ?>:</b>
	<?php echo CHtml::encode($data->ShopLocation_Y); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShopName')); ?>:</b>
	<?php echo CHtml::encode($data->ShopName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShopPhone')); ?>:</b>
	<?php echo CHtml::encode($data->ShopPhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createTime')); ?>:</b>
	<?php echo CHtml::encode($data->createTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateTime')); ?>:</b>
	<?php echo CHtml::encode($data->updateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prize')); ?>:</b>
	<?php echo CHtml::encode($data->prize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count')); ?>:</b>
	<?php echo CHtml::encode($data->count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startTime')); ?>:</b>
	<?php echo CHtml::encode($data->startTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endTime')); ?>:</b>
	<?php echo CHtml::encode($data->endTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rate')); ?>:</b>
	<?php echo CHtml::encode($data->rate); ?>
	<br />

	*/ ?>

</div>