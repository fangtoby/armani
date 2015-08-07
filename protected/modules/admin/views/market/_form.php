<?php
/* @var $this MarketController */
/* @var $model Market */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'market-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ShopID'); ?>
		<?php echo $form->textField($model,'ShopID'); ?>
		<?php echo $form->error($model,'ShopID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CityID'); ?>
		<?php echo $form->textField($model,'CityID'); ?>
		<?php echo $form->error($model,'CityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CounterManager'); ?>
		<?php echo $form->textField($model,'CounterManager',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'CounterManager'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DirectorName'); ?>
		<?php echo $form->textField($model,'DirectorName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'DirectorName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ShopAddress'); ?>
		<?php echo $form->textField($model,'ShopAddress',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'ShopAddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ShopCode'); ?>
		<?php echo $form->textField($model,'ShopCode',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ShopCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ShopEmail'); ?>
		<?php echo $form->textField($model,'ShopEmail',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'ShopEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ShopLocation_X'); ?>
		<?php echo $form->textField($model,'ShopLocation_X',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ShopLocation_X'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ShopLocation_Y'); ?>
		<?php echo $form->textField($model,'ShopLocation_Y',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ShopLocation_Y'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ShopName'); ?>
		<?php echo $form->textField($model,'ShopName',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'ShopName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ShopPhone'); ?>
		<?php echo $form->textField($model,'ShopPhone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ShopPhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createTime'); ?>
		<?php echo $form->textField($model,'createTime'); ?>
		<?php echo $form->error($model,'createTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updateTime'); ?>
		<?php echo $form->textField($model,'updateTime'); ?>
		<?php echo $form->error($model,'updateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prize'); ?>
		<?php echo $form->textField($model,'prize'); ?>
		<?php echo $form->error($model,'prize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count'); ?>
		<?php echo $form->textField($model,'count'); ?>
		<?php echo $form->error($model,'count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startTime'); ?>
		<?php echo $form->textField($model,'startTime'); ?>
		<?php echo $form->error($model,'startTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endTime'); ?>
		<?php echo $form->textField($model,'endTime'); ?>
		<?php echo $form->error($model,'endTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rate'); ?>
		<?php echo $form->textField($model,'rate'); ?>
		<?php echo $form->error($model,'rate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->