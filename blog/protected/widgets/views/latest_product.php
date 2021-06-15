<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Latest Products</h2>
                    <div class="product-carousel">
                        <?php foreach (Product::model()->getLatest() as $value) : ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img id="imgProduct<?= $value->id ?>" src="<?= get_BaseUrl() . $value->image ?>" alt="">
                                    <div class="product-hover">
                                        <a href="javascript:voice(0);" onclick="addToCart(<?= $value->id ?>)" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="/product/detail/<?= getOptionSlug('product_id', $value->id) ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="/product/detail/<?= getOptionSlug('product_id', $value->id) ?>"><span id="product_name_for_modal_<?= $value->id ?>"><?= $value->name ?></span></a></h2>

                                <div class="product-carousel-price">
                                    <span id="price_add_cart_<?= $value->id ?>"><?= get_price_apply_i18n($value->price) ?></span></ins> <del>$100.00</del>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->