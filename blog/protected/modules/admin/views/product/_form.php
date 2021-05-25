<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'product-form',
		'enableAjaxValidation' => true,
		'htmlOptions' => array(
			'enctype' => 'multipart/form-data',
		),
		'method' => 'post',
		'focus' => array($model, 'name'),
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'description'); ?>
		<?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model, 'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'category_id'); ?>
		<?php echo $form->dropDownList($model, 'category_id', $data, array('empty' => 'Choose category')); ?>
		<?php echo $form->error($model, 'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'price'); ?>
		<?php echo $form->textField($model, 'price'); ?>
		<?php echo $form->error($model, 'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'image'); ?>
		<?php echo $form->FileField($model, 'image', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'image2'); ?>
		<?php echo $form->FileField($model, 'image2', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'image2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'image3'); ?>
		<?php echo $form->FileField($model, 'image3', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'image3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'image4'); ?>
		<?php echo $form->FileField($model, 'image4', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'image4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'status'); ?>
		<?php echo $form->textField($model, 'status'); ?>
		<?php echo $form->error($model, 'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'meta_key'); ?>
		<?php echo $form->textArea($model, 'meta_key', array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model, 'meta_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'meta_description'); ?>
		<?php echo $form->textArea($model, 'meta_description', array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model, 'meta_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'create_time'); ?>
		<?php echo $form->textField($model, 'create_time'); ?>
		<?php echo $form->error($model, 'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'update_time'); ?>
		<?php echo $form->textField($model, 'update_time'); ?>
		<?php echo $form->error($model, 'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'author_id'); ?>
		<?php echo $form->textField($model, 'author_id'); ?>
		<?php echo $form->error($model, 'author_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->