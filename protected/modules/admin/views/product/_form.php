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
        <?php echo $form->labelEx($slugModel, 'slug'); ?>
        <?php echo $form->textField($slugModel, 'slug', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($slugModel, 'slug'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model, 'description'); ?>
		<?php //echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 50)); 
		$this->widget('application.extensions.eckeditor.ECKEditor', array(
			"model" => $model,
			"attribute" => 'description',
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
		<?php echo $form->labelEx($model, 'category_id'); ?>
		<?php echo $form->dropDownList($model, 'category_id', $dataCategory, array('empty' => 'Choose category')); ?>
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
        <?php echo $form->dropDownList($model, 'author_id', $dataAuthor, array('empty' => 'Choose other user')); ?>
        <?php echo $form->error($model, 'author_id'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->