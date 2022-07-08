<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'post-form',
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($slugModel, 'slug'); ?>
		<?php echo $form->textField($slugModel, 'slug', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($slugModel, 'slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'content'); ?>
		<?php //echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 50)); 
		$this->widget('application.extensions.eckeditor.ECKEditor', array(
			"model" => $model,
			"attribute" => 'content',
			"config" => array(
				"height" => "400px",
				"width" => "100%",
				"toolbar" => "Basic",
				'editorTemplate' => 'full',
			),
		));
		?>
		<?php echo $form->error($model, 'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'tag'); ?>
		<?php echo $form->textField($model, 'tag', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'status'); ?>
		<?php echo $form->textField($model, 'status'); ?>
		<?php echo $form->error($model, 'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'create_time'); ?>
		<?php
		//echo $form->textField($model, 'create_time'); 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'create_time',
			'options' => array(
				'showOn' => 'both',				// also opens with a button
				'dateFormat' => 'yy-mm-dd',		// format of "2012-12-25"
				'showOtherMonths' => true,		// show dates in other months
				'selectOtherMonths' => true,	// can seelect dates in other months
				'changeYear' => true,			// can change year
				'changeMonth' => true,
				'yearRange' => '2000:2099',		// range of year
				'minDate' => '1900-01-01',		// minimum date
				'maxDate' => '2099-12-31',		// maximum date
				'showButtonPanel' => true,
			),
			'htmlOptions' => array(
				// 'size' => '10',			// textField size
				'maxlength' => '10',	// textField maxlength
			),
		));
		?>
		<?php echo $form->error($model, 'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'update_time'); ?>
		<?php //echo $form->textField($model, 'update_time');
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'update_time',
			'options' => array(
				'showOn' => 'both',				// also opens with a button
				'dateFormat' => 'yy-mm-dd',		// format of "2012-12-25"
				'showOtherMonths' => true,		// show dates in other months
				'selectOtherMonths' => true,	// can seelect dates in other months
				'changeYear' => true,			// can change year
				'changeMonth' => true,
				'yearRange' => '2000:2099',		// range of year
				'minDate' => '1900-01-01',		// minimum date
				'maxDate' => '2099-12-31',		// maximum date
				'showButtonPanel' => true,
			),
			'htmlOptions' => array(
				// 'size' => '10',			// textField size
				'maxlength' => '10',	// textField maxlength
			),
		));
		?>
		<?php echo $form->error($model, 'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'author_id'); ?>
		<?php echo $form->dropDownList($model, 'author_id', $data, array('empty' => 'Choose other user')); ?>
		<?php echo $form->error($model, 'author_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->