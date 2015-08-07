<?php
/* @var $this CityController */
/* @var $data City */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CityID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CityID), array('view', 'id'=>$data->CityID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CityName')); ?>:</b>
	<?php echo CHtml::encode($data->CityName); ?>
	<br />


</div>