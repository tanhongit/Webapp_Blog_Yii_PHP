<?php
/* @var $this LanguageCodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Language Codes',
);

$this->menu=array(
	array('label'=>'Create LanguageCode', 'url'=>array('create')),
	array('label'=>'Manage LanguageCode', 'url'=>array('admin')),
);
?>

<h1>Language Codes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
