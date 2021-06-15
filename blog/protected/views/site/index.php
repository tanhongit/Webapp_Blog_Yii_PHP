<!-- <?php
		/* @var $this SiteController */
		require_once('protected/scripts/globals.php');
		$this->pageTitle = Yii::app()->name;
		?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<?= dynamic_url_internationalization() ?>
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

<?php $form = $this->beginWidget('CActiveForm', array(
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

<?php $this->widget('application.widgets.slideshow'); ?>

<div class="promo-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="single-promo promo1">
					<i class="fa fa-refresh"></i>
					<p>30 Days return</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-promo promo2">
					<i class="fa fa-truck"></i>
					<p>Free shipping</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-promo promo3">
					<i class="fa fa-lock"></i>
					<p>Secure payments</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-promo promo4">
					<i class="fa fa-gift"></i>
					<p>New products</p>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End promo area -->

<?php $this->widget('application.widgets.latest_product'); ?>

<div class="brands-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="brand-wrapper">
					<div class="brand-list">
						<img src="/img/brand1.png" alt="">
						<img src="/img/brand2.png" alt="">
						<img src="/img/brand3.png" alt="">
						<img src="/img/brand4.png" alt="">
						<img src="/img/brand5.png" alt="">
						<img src="/img/brand6.png" alt="">
						<img src="/img/brand1.png" alt="">
						<img src="/img/brand2.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End brands area -->

<div class="product-widget-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="single-product-widget">
					<h2 class="product-wid-title">Top Sellers</h2>
					<a href="" class="wid-view-more">View All</a>
					<div class="single-wid-product">
						<a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
						<h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$400.00</ins> <del>$425.00</del>
						</div>
					</div>
					<div class="single-wid-product">
						<a href="single-product.html"><img src="img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
						<h2><a href="single-product.html">Apple new mac book 2015</a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$400.00</ins> <del>$425.00</del>
						</div>
					</div>
					<div class="single-wid-product">
						<a href="single-product.html"><img src="img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
						<h2><a href="single-product.html">Apple new i phone 6</a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$400.00</ins> <del>$425.00</del>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-product-widget">
					<h2 class="product-wid-title">Top Views</h2>
					<a href="/product/topview" class="wid-view-more">View All</a>
					<?php foreach (Product::model()->getTopView() as $value) : ?>
						<div class="single-wid-product">
							<a href="/product/detail/<?= getOptionSlug('product_id', $value->id) ?>"><img id="imgProduct<?= $value->id ?>" src="<?= get_BaseUrl() . $value->image ?>" alt="" class="product-thumb"></a>
							<h2><a href="/product/detail/<?= getOptionSlug('product_id', $value->id) ?>"><span id="product_name_for_modal_<?= $value->id ?>"><?= $value->name ?></span></a></h2>
							<!-- <div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div> -->
							<div class="product-wid-price">
								<ins><?= get_price_apply_i18n($value->price) ?></ins> <del>$425.00</del>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-product-widget">
					<h2 class="product-wid-title">Recently Viewed</h2>
					<a href="#" class="wid-view-more">View All</a>
					<div class="single-wid-product">
						<a href="single-product.html"><img src="img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
						<h2><a href="single-product.html">Apple new i phone 6</a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$400.00</ins> <del>$425.00</del>
						</div>
					</div>
					<div class="single-wid-product">
						<a href="single-product.html"><img src="img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
						<h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$400.00</ins> <del>$425.00</del>
						</div>
					</div>
					<div class="single-wid-product">
						<a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
						<h2><a href="single-product.html">Sony playstation microsoft</a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$400.00</ins> <del>$425.00</del>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End product widget area -->