<?php
/* @var $this MarketController */
/* @var $model Market */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ShopID'); ?>
		<?php echo $form->textField($model,'ShopID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CityID'); ?>
		<?php echo $form->textField($model,'CityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CounterManager'); ?>
		<?php echo $form->textField($model,'CounterManager',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DirectorName'); ?>
		<?php echo $form->textField($model,'DirectorName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ShopAddress'); ?>
		<?php echo $form->textField($model,'ShopAddress',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ShopCode'); ?>
		<?php echo $form->textField($model,'ShopCode',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ShopEmail'); ?>
		<?php echo $form->textField($model,'ShopEmail',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ShopLocation_X'); ?>
		<?php echo $form->textField($model,'ShopLocation_X',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ShopLocation_Y'); ?>
		<?php echo $form->textField($model,'ShopLocation_Y',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ShopName'); ?>
		<?php echo $form->textField($model,'ShopName',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ShopPhone'); ?>
		<?php echo $form->textField($model,'ShopPhone',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createTime'); ?>
		<?php echo $form->textField($model,'createTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updateTime'); ?>
		<?php echo $form->textField($model,'updateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prize'); ?>
		<?php echo $form->textField($model,'prize'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count'); ?>
		<?php echo $form->textField($model,'count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'startTime'); ?>
		<?php echo $form->textField($model,'startTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'endTime'); ?>
		<?php echo $form->textField($model,'endTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rate'); ?>
		<?php echo $form->textField($model,'rate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->