<?php
/* @var $this PrizeController */
/* @var $model Prize */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prize-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note'); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count'); ?>
		<?php echo $form->textField($model,'count'); ?>
		<?php echo $form->error($model,'count'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'rate'); ?>
		<?php echo $form->textField($model,'rate'); ?>
		<?php echo $form->error($model,'rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
<?php echo CHtml::dropDownList( 'Prize[type]', $model->type, $this->prizeType ,array( "id"=>"Prize_type"  ) );  ?>
		<?php echo $form->error($model,'type'); ?>
        <span>0是普通奖品，1是特别奖品，2正装大奖</span>
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
		<?php echo $form->labelEx($model,'hourNumber'); ?>
		<?php echo $form->textField($model,'hourNumber'); ?>
		<?php echo $form->error($model,'hourNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dayNumber'); ?>
		<?php echo $form->textField($model,'dayNumber'); ?>
		<?php echo $form->error($model,'dayNumber'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '添 加' : '更 新'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
	//$('#Market_startTime,#Market_endTime')
	laydate({
		elem: '#Prize_startTime', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
	    format: 'YYYY/MM/DD hh:mm:ss',
		event: 'focus' //响应事件。如果没有传入event，则按照默认的click
	});
	laydate({
		elem: '#Prize_endTime', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
	    format: 'YYYY/MM/DD hh:mm:ss',		
		event: 'focus' //响应事件。如果没有传入event，则按照默认的click
	});

</script>