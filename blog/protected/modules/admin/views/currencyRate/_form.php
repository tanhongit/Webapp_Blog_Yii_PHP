<?php
/* @var $this CurrencyRateController */
/* @var $model CurrencyRate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'currency-rate-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_name'); ?>
		<?php echo $form->textField($model,'currency_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'currency_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_code'); ?>
		<?php echo $form->textField($model,'currency_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'currency_code'); ?>
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