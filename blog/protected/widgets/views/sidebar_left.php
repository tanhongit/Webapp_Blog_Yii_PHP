<?php
$recent_data = Product::model()->getRecent();
$recent_post_data = Post::model()->getRecentPost();
?>
<div class="col-md-3">
    <div class="single-sidebar">
        <h2 class="sidebar-title">Search Products</h2>
        <form method="GET" action="/search">
            <input type="text" name="keyword" id="keyword" placeholder="Search products...">
            <input type="submit" value="Search">
        </form>
    </div>

    <div class="single-sidebar">
        <h2 class="sidebar-title">Products</h2>
        <?php foreach ($recent_data as $value) : ?>

            <div class="thubmnail-recent">
                <img id='imgProduct<?= $value->id ?>' src="<?= get_BaseUrl() . $value->image ?>" class="recent-thumb" alt="">
                <h2><a href="/product/detail/<?= $value->id ?>"><?= $value->name ?></a></h2>
                <div class="product-sidebar-price">
                    <ins><span id="price_<?= $value->id ?>">
                            <?php get_price_apply_i18n($value->price); ?>
                        </span>
                    </ins> <del>$00.00</del>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="single-sidebar">
        <h2 class="sidebar-title">Recent Posts</h2>
        <ul>
            <?php foreach ($recent_post_data as $value) : ?>
                <li><a href="/post/<?= $value->id ?>"><?= $value->title ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- <?php
            echo Yii::app()->numberFormatter->formatCurrency(12345678, Yii::app()->params->currency);
            ?> -->
</div>