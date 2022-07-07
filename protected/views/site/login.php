<?php
$this->breadcrumbs = array(
	'Login',
);
?>
<div class="container" style="padding: 50px;">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'login-form',
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
		),
		'focus' => array($model, 'username'),
	));
	?>
	<div class="woocommerce-info">
		<?php echo $form->errorSummary($model); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model, 'username'); ?>
		<?php echo $form->textField($model, 'username', array('class' => "form-control", 'placeholder' => 'Ten dang nhap')); ?>
		<?php echo $form->error($model, 'username', array('class' => "form-text text-muted")); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model, 'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('class' => "form-control", 'placeholder' => 'Password')); ?>
		<?php echo $form->error($model, 'password', array('class' => "form-text text-muted")); ?>
	</div>
	<div class="form-group form-check">
		<?php echo $form->checkBox($model, 'rememberMe', array('class' => "form-check-input")); ?>
		<?php echo $form->label($model, 'rememberMe', array('class' => "form-check-label")); ?>
	</div>
	<?php echo CHtml::submitButton('Login', array('class' => "btn btn-primary")); ?>
	<?php $this->endWidget(); ?>
</div>