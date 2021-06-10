<?php
/* @var $this SlugController */
/* @var $model Slug */

$this->breadcrumbs=array(
	'Slugs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Slug', 'url'=>array('index')),
	array('label'=>'Create Slug', 'url'=>array('create')),
	array('label'=>'Update Slug', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Slug', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Slug', 'url'=>array('admin')),
);
?>

<h1>View Slug #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'slug',
		'product_id',
		'post_id',
		'category_id',
		'tag_id',
	),
)); ?>
