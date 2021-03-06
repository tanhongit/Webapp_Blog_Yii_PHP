<?php /* @var $this Controller */
$this->actionSettings();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container" id="page">

		<div id="header">
			<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
		</div><!-- header -->

		<div id="mainmenu">
			<?php $this->widget('zii.widgets.CMenu', array(
				'items' => array(
					array('label' => 'Home', 'url' => array('/site/index')),
					array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
					array('label' => 'Contact', 'url' => array('/site/contact')),
					array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
					array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
				),
			)); ?>
		</div><!-- mainmenu -->

		<?php if (isset($this->breadcrumbs)) : ?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links' => $this->breadcrumbs,
			)); ?>
			<!-- breadcrumbs -->
		<?php endif ?>

		<?php echo $content; ?>

		<div class="clear"></div>

		<div id="footer">
			<div> Copyright &copy; <?php echo date('Y'); ?> by My Company.<br />
				All Rights Reserved.<br />
				<?php echo Yii::powered(); ?>
			</div>
			<?php $form = $this->beginWidget('CActiveForm', array(
				'id' => 'language-form',
			)); ?>
			<div class="row">
				<?php

				$test_main_url = explode('.', $_SERVER['HTTP_HOST']);
				echo CHtml::dropDownList(
					'language',
					'empty',
					array('empty' => 'Choose language', 'vi' => 'Vietnamese', 'en' => 'EN', 'fr' => 'French', 'more' => array('test 1', 'test 2')),
					array('submit' => '')
				); ?>
				<?php echo CHtml::submitButton('Change'); ?>
			</div>
			<?php $this->endWidget(); ?>

			<div class="datetime">
				<?= $this->showDateTimeFormat(); ?>
			</div>
		</div><!-- footer -->

	</div><!-- page -->

</body>

</html>