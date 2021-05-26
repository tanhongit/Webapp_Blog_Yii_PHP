<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
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

<p><span><?php echo Yii::t('app', 'index.hello.text') ?></span> - <span><?= $this->showDateFormat() ?></span></p>

<!-- <?php $form = $this->beginWidget('CActiveForm', array(
			'id' => 'language-form',
		)); ?>
<div class="row">
	<?php

	$test_main_url = explode('.', $_SERVER['HTTP_HOST']);
	print_r($test_main_url);
	echo '<br>';
	echo CHtml::dropDownList(
		'language',
		'empty',
		array('empty' => 'Choose language', 'vi' => 'Vietnamese', 'fr' => 'French', 'more' => array('test 1', 'test 2'))
	); ?>
</div>
<div class="row buttons">
	<?php echo CHtml::submitButton('Change'); ?>
</div>
<?php $this->endWidget(); ?> -->

<div class="slider-area">
	<!-- Slider -->
	<div class="block-slider block-slider4">
		<ul class="" id="bxslider-home4">
			<li>
				<img src="img/h4-slide.png" alt="Slide">
				<div class="caption-group">
					<h2 class="caption title">
						iPhone <span class="primary">6 <strong>Plus</strong></span>
					</h2>
					<h4 class="caption subtitle">Dual SIM</h4>
					<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
				</div>
			</li>
			<li><img src="img/h4-slide2.png" alt="Slide">
				<div class="caption-group">
					<h2 class="caption title">
						by one, get one <span class="primary">50% <strong>off</strong></span>
					</h2>
					<h4 class="caption subtitle">school supplies & backpacks.*</h4>
					<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
				</div>
			</li>
			<li><img src="img/h4-slide3.png" alt="Slide">
				<div class="caption-group">
					<h2 class="caption title">
						Apple <span class="primary">Store <strong>Ipod</strong></span>
					</h2>
					<h4 class="caption subtitle">Select Item</h4>
					<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
				</div>
			</li>
			<li><img src="img/h4-slide4.png" alt="Slide">
				<div class="caption-group">
					<h2 class="caption title">
						Apple <span class="primary">Store <strong>Ipod</strong></span>
					</h2>
					<h4 class="caption subtitle">& Phone</h4>
					<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
				</div>
			</li>
		</ul>
	</div>
	<!-- ./Slider -->
</div> <!-- End slider area -->