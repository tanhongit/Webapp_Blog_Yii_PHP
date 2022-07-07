<?php
/* @var $this LanguageCodeController */
/* @var $model LanguageCode */

$this->breadcrumbs=array(
	'Language Codes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LanguageCode', 'url'=>array('index')),
	array('label'=>'Create LanguageCode', 'url'=>array('create')),
	array('label'=>'View LanguageCode', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LanguageCode', 'url'=>array('admin')),
);
?>

<h1>Update LanguageCode <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>