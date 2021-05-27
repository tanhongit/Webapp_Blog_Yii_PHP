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

	<div class="header-area">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="user-menu">
						<ul>
							<li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
							<li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
							<li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
							<li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
							<li><a href="/login"><i class="fa fa-user"></i> Login</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4">
					<div class="header-right">
						<ul class="list-unstyled list-inline">
							<li class="dropdown dropdown-small">
								<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">USD</a></li>
									<li><a href="#">INR</a></li>
									<li><a href="#">GBP</a></li>
								</ul>
							</li>

							<li class="dropdown dropdown-small">
								<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?= dynamic_url_internationalization() ?>.en">English</a></li>
									<li><a href="<?= dynamic_url_internationalization() ?>.fr">French</a></li>
									<li><a href="<?= dynamic_url_internationalization() ?>.vi">Vietnamese</a></li>
									<li><a href="<?= dynamic_url_internationalization() ?>.it">Italian</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- End header area -->

	<div class="site-branding-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="logo">
						<h1><a href="./"><img src="/img/logo.png"></a></h1>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="shopping-item">
						<a href="cart.html">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- End site branding area -->

	<div class="mainmenu-area">
		<div class="container">
			<div class="row">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-collapse collapse">
					<?php $this->widget('zii.widgets.CMenu', array(
						'htmlOptions' => array(
							'class' => 'nav navbar-nav',
						),
						'items' => array(
							array('label' => 'Home', 'url' => array('/site/index')),
							array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
							array('label' => 'Contact', 'url' => array('/site/contact')),
							array('label' => 'Product', 'url' => array('/product')),
							array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
							array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
						),
					)); ?>
				</div>
			</div>
		</div>
	</div> <!-- End mainmenu area -->

	<?php if (isset($this->breadcrumbs)) : ?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		)); ?>
		<!-- breadcrumbs -->
	<?php endif ?>

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
						<?php $form = $this->beginWidget('CActiveForm', array(
							'id' => '',
							'htmlOptions' => array(
								'class' => 'country_to_state country_select',
							),
						));
						echo CHtml::dropDownList(
							'language',
							'empty',
							array('empty' => 'Choose language', 'vi' => 'Vietnamese', 'en' => 'EN', 'fr' => 'French', 'more' => array('it' => 'Italian', 'test 2')),
							['onchange' => 'this.form.submit()']
						); ?>
						<?php $this->endWidget(); ?>
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
					<div class="footer-newsletter">
						<h2 class="footer-wid-title">Newsletter</h2>
						<p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
						<div class="newsletter-form">
							<form action="#">
								<input type="email" placeholder="Type your email">
								<input type="submit" value="Subscribe">
							</form>
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

	<!-- Slider -->
	<script type="text/javascript" src="<?= get_BaseUrl(); ?>/js/bxslider.min.js"></script>
	<script type="text/javascript" src="<?= get_BaseUrl(); ?>/js/script.slider.js"></script>
</body>

</html>