<?php
/* @var $this CurrencyRateController */
/* @var $data CurrencyRate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_name')); ?>:</b>
	<?php echo CHtml::encode($data->currency_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_code')); ?>:</b>
	<?php echo CHtml::encode($data->currency_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rate')); ?>:</b>
	<?php echo CHtml::encode($data->rate); ?>
	<br />


</div>