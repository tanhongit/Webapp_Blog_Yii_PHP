<div class="header-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="user-menu">
					<ul>
						<li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
						<li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
						<li><a href="/cart"><i class="fa fa-user"></i> My Cart</a></li>
						<li><a href="/checkout"><i class="fa fa-user"></i> Checkout</a></li>
						<li><a href="/login"><i class="fa fa-user"></i> Login</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-4">
				<div class="header-right">
					<ul class="list-unstyled list-inline">
						
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

<div class="site-branding-area" id="mini-cart-menu">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="logo">
					<h1><a href="<?= get_site_url() ?>"><img src="/img/logo.png"></a></h1>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="shopping-item" id="shopping-item">
					<a href="/cart">Cart - <span class="cart-amunt"><?= get_price_apply_i18n(Cart::totalPriceCart()) ?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count" id="quality_cart"><?= $total_quality_cart ?></span></a>
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