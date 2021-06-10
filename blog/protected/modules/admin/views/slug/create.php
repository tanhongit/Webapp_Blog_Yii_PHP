<?php
/* @var $this SlugController */
/* @var $model Slug */

$this->breadcrumbs=array(
	'Slugs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Slug', 'url'=>array('index')),
	array('label'=>'Manage Slug', 'url'=>array('admin')),
);
?>

<h1>Create Slug</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>