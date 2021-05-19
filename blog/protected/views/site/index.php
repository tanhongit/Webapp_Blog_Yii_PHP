<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;

$this->actionSettings();
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
	the <a href="http://www.yiiframework.com/doc/">documentation</a>.
	Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
	should you have any questions.</p>


<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'language-form',
)); ?>
<div class="row">
	<?php echo CHtml::dropDownList(
		'language',
		'empty',
		array('empty' => 'Choose language', 'vi' => 'Vietnamese', 'fr' => 'French', 'more' => array('test 1', 'test 2'))
	); ?>
</div>
<div class="row buttons">
	<?php echo CHtml::submitButton('Change'); ?>
</div>
<?php $this->endWidget(); ?>