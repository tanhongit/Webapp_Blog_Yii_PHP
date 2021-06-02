<?php
require_once('protected/scripts/globals.php');
/* @var $this Controller */
$this->actionSettings();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<!-- Google Fonts -->
	<link href='http://fonts.googl
	eapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= get_BaseUrl(); ?>/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= get_BaseUrl(); ?>/css/font-awesome.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?= get_BaseUrl(); ?>/css/owl.carousel.css">
	<link rel="stylesheet" href="<?= get_BaseUrl(); ?>/css/style.css">
	<link rel="stylesheet" href="<?= get_BaseUrl(); ?>/css/responsive.css">

</head>

<body>

	<?php $this->widget('application.widgets.menu_client'); ?>

	<div class="product-big-title-area">
		<style>
			.product-bit-title h2 a {
				text-decoration: none;
				color: white;
			}
		</style>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="product-bit-title text-center">
						<h2>
							<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								'htmlOptions' => array(),
								'links' => $this->breadcrumbs,
							)); ?>
						</h2>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php echo $content; ?>

	<div class="footer-top-area">
		<div class="zigzag-bottom"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="footer-about-us">
						<h2>u<span>Stora</span></h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
						<div class="footer-social">
							<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
							<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="footer-menu">
						<h2 class="footer-wid-title">User Navigation </h2>
						<ul>
							<li><a href="#">My account</a></li>
							<li><a href="#">Order history</a></li>
							<li><a href="#">Wishlist</a></li>
							<li><a href="#">Vendor contact</a></li>
							<li><a href="#">Front page</a></li>
						</ul>
					</div>
					<div class="footer-menu">

					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="footer-menu">
						<h2 class="footer-wid-title">Categories</h2>
						<ul>
							<li><a href="#">Mobile Phone</a></li>
							<li><a href="#">Home accesseries</a></li>
							<li><a href="#">LED TV</a></li>
							<li><a href="#">Computer</a></li>
							<li><a href="#">Gadets</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="woocommerce">
						<div id="customer_details" class="col2-set">
							<div class="woocommerce-billing-fields">
								<h3>Languages</h3>
								<p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
									<?php
									$data_lang_code = array('empty' => 'Choose language');
									foreach (LanguageCode::getAllLanguageCode() as $value) {
										$data_lang_code[$value['first_code']] = $value['name'];
									}
									$form = $this->beginWidget('CActiveForm', array(
										'id' => 'select_language',
										'htmlOptions' => array(
											'class' => 'country_to_state country_select',
										),
									));
									echo CHtml::dropDownList(
										'language',
										'empty',
										$data_lang_code,
										['onchange' => 'this.form.submit()']
									); ?>
									<?php $this->endWidget(); ?>
								</p>
							</div>
						</div>
					</div>
					<div class="woocommerce">
						<div id="customer_details" class="col2-set">
							<div class="woocommerce-billing-fields">
								<h3>Billing Details</h3>
								<p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
									<?php $form = $this->beginWidget('CActiveForm', array(
										'id' => 'select_language',
										'htmlOptions' => array(
											'class' => 'country_to_state country_select',
										),
									));
									echo CHtml::dropDownList(
										'language',
										'empty',
										array(
											'empty' => 'Choose language', 'vi' => 'Vietnamese', 'en' => 'EN', 'fr' => 'French', 'more' => array('it' => 'Italian', 'test 2')
										),
										['onchange' => 'this.form.submit()']
									); ?>
									<?php $this->endWidget(); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- End footer top area -->

	<div class="footer-bottom-area">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="copyright">
						<p>Copyright &copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved.</p>
						<?php echo Yii::powered(); ?>
					</div>
				</div>
				<div class="col-md-4">
					</p><?= $this->showDateTimeFormat(); ?><p>
				</div>
				<div class="col-md-4">
					<div class="footer-card-icon">
						<i class="fa fa-cc-discover"></i>
						<i class="fa fa-cc-mastercard"></i>
						<i class="fa fa-cc-paypal"></i>
						<i class="fa fa-cc-visa"></i>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- End footer bottom area -->

	<div class="modal fade" tabindex="-1" role="dialog" id="modal-show">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><?= Yii::t('product', 'model.product.info_add_cart') ?></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6">
							<img data-src='#' class='thumbnail' id="img_add_Cart" alt="">
						</div>
						<div class="col-sm-6">
							price <span id="price_add_cart_model"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="/cart" class="btn btn-info">Go to Cart</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- Latest jQuery form server -->
	<script src="https://code.jquery.com/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script src="<?= get_BaseUrl(); ?>/js/bootstrap.min.js"></script>

	<!-- jQuery sticky menu -->
	<script src="<?= get_BaseUrl(); ?>/js/owl.carousel.min.js"></script>
	<script src="<?= get_BaseUrl(); ?>/js/jquery.sticky.js"></script>

	<!-- jQuery easing -->
	<script src="<?= get_BaseUrl(); ?>/js/jquery.easing.1.3.min.js"></script>

	<!-- Main Script -->
	<script src="<?= get_BaseUrl(); ?>/js/main.js"></script>

	<!-- cart -->
	<script>
		$('#shipping_address_div').hide();
		var url = "<?= get_BaseUrl() ?>";

		function addToCart(id) {
			// alert('pro added cart' + id);
			imgForProduct = $('#imgProduct' + id).attr('src');
			priceForProduct = $('#price_add_cart_' + id).text();
			$('#price_add_cart_model').text(priceForProduct);
			$('#img_add_Cart').attr({
				'src': imgForProduct
			})
			$.post(url + '/shoppingCart/addCart', {
				'product_id': id
			}, function(data) {
				$('#quality_cart').text(data);
				$('#modal-show').modal('show');
			});
		}

		jQuery(document).ready(function($) {
			$('#ship-to-different-address-checkbox').bind('change', function() {
				if ($(this).is(':checked')) {
					$('#shipping_address_div').show();
				} else {
					$('#shipping_address_div').hide();
				}
			});
		});
	</script>

	<!-- Slider -->
	<script type="text/javascript" src="<?= get_BaseUrl(); ?>/js/bxslider.min.js"></script>
	<script type="text/javascript" src="<?= get_BaseUrl(); ?>/js/script.slider.js"></script>
</body>

</html>