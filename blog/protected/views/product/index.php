<?php
/* @var $this ProductController */
require_once('protected/scripts/globals.php');
$this->breadcrumbs = array(
	'Product',
);
// print_r('<pre>');
// print_r($data);die;
?>

<div class="single-product-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<?php
			foreach ($data as $value) :
			?>
				<div class="col-md-3 col-sm-6">
					<div class="single-shop-product">
						<div class="product-upper">
							<img src="<?= Yii::app()->request->baseUrl . $value->image ?>" alt="<?= $value->image ?>">
						</div>
						<h2><a href=""><?= $value->name ?></a></h2>
						<div class="product-carousel-price">
							<ins><?= $value->price ?></ins> <del>$0.00</del>
						</div>

						<div class="product-option-shop">
							<a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
						</div>
					</div>
				</div>
			<?php
			endforeach;
			?>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="product-pagination text-center">
					<nav>
						<?php
						$this->widget('CLinkPager', array(
							'htmlOptions' => array('class' => 'pagination'),
							'currentPage' => $pages->getCurrentPage(),
							'itemCount' => $item_count,
							'pageSize' => $page_size,
							'maxButtonCount' => 4,
							'header' => '',
							'firstPageLabel' => '|<',
							'prevPageLabel' => '&laquo;',
							'nextPageLabel' => '&raquo;',
							'lastPageLabel' => '>|',

						));
						// print_r('<pre>');
						// print_r(Yii::app()->user->getState('currentUserInfo'));
						?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
<?php
print_r(get_BaseUrl());
print_r(Yii::app()->cache->get('testquery')); ?>