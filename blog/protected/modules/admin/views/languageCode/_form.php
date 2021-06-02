<?php
/* @var $this LanguageCodeController */
/* @var $model LanguageCode */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'language-code-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_code'); ?>
		<?php echo $form->textField($model,'first_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'first_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'second_code'); ?>
		<?php echo $form->textField($model,'second_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'second_code'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->