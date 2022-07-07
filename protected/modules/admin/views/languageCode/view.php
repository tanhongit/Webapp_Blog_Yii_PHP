<?php
/* @var $this LanguageCodeController */
/* @var $model LanguageCode */

$this->breadcrumbs=array(
	'Language Codes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List LanguageCode', 'url'=>array('index')),
	array('label'=>'Create LanguageCode', 'url'=>array('create')),
	array('label'=>'Update LanguageCode', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LanguageCode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LanguageCode', 'url'=>array('admin')),
);
?>

<h1>View LanguageCode #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'first_code',
		'second_code',
	),
)); ?>
