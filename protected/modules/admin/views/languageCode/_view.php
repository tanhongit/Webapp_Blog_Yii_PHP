<?php
/* @var $this LanguageCodeController */
/* @var $data LanguageCode */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_code')); ?>:</b>
	<?php echo CHtml::encode($data->first_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('second_code')); ?>:</b>
	<?php echo CHtml::encode($data->second_code); ?>
	<br />


</div>