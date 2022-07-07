<?php
// $sql = 'SELECT * FROM tbl_product LIMIT 2';
// $rows = Yii::app()->db->createCommand($sql)->queryAll();
// Yii::app()->cache->set('testquery', $rows, 10);
// print_r('<pre>');
// print_r(Yii::app()->cache->get('testquery'));
require_once('protected/scripts/globals.php');
$this->breadcrumbs = array(
    'Product',
    $category_name,
);
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
                            <a href="/product/detail/<?= getOptionSlug('product_id', $value->id) ?>"><img id="imgProduct<?= $value->id ?>" src="<?= Yii::app()->request->baseUrl . $value->image ?>" alt="<?= $value->image ?>"></a>
                        </div>
                        <h2><a href="/product/detail/<?= getOptionSlug('product_id', $value->id) ?>"><span id="product_name_for_modal_<?= $value->id ?>"><?= getSubStrString($value->name, 50) ?></span></a></h2>
                        <div class="product-carousel-price">
                            <ins><span id="price_add_cart_<?= $value->id ?>"><?= get_price_apply_i18n($value->price) ?></span></ins> <del>$0.00</del>
                        </div>

                        <div class="product-option-shop">
                            <a href="javascript:voice(0);" class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" onclick="addToCart(<?= $value->id ?>)">Add to cart</a>
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