<?php
$recent_data = Product::getRecentProduct();
$recent_post_data = Post::getRecentPost();
?>
<div class="col-md-4">
    <div class="single-sidebar">
        <h2 class="sidebar-title">Search Products</h2>
        <form action="">
            <input type="text" placeholder="Search products...">
            <input type="submit" value="Search">
        </form>
    </div>

    <div class="single-sidebar">
        <h2 class="sidebar-title">Products</h2>
        <?php foreach ($recent_data as $value) : ?>

            <div class="thubmnail-recent">
                <img id='imgProduct<?= $value->id ?>' src="<?= get_BaseUrl() . $value->image ?>" class="recent-thumb" alt="">
                <h2><a href="<?= $value->id ?>"><?= $value->name ?></a></h2>
                <div class="product-sidebar-price">
                    <ins><span id="price_<?= $value->id ?>"><?= number_format($value->price, 0, ',', '.') ?></span></ins> <del>$00.00</del>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="single-sidebar">
        <h2 class="sidebar-title">Recent Posts</h2>
        <ul>
            <?php foreach ($recent_post_data as $value) : ?>
                <li><a href="<?= $value->id ?>"><?= $value->title ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>