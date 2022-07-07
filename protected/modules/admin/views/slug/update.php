<?php
/* @var $this SlugController */
/* @var $model Slug */

$this->breadcrumbs=array(
	'Slugs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Slug', 'url'=>array('index')),
	array('label'=>'Create Slug', 'url'=>array('create')),
	array('label'=>'View Slug', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Slug', 'url'=>array('admin')),
);
?>

<h1>Update Slug <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>