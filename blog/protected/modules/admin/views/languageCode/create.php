<?php
/* @var $this LanguageCodeController */
/* @var $model LanguageCode */

$this->breadcrumbs=array(
	'Language Codes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LanguageCode', 'url'=>array('index')),
	array('label'=>'Manage LanguageCode', 'url'=>array('admin')),
);
?>

<h1>Create LanguageCode</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>