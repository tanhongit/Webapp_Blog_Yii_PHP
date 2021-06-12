<?php
require_once('protected/scripts/globals.php');
$this->breadcrumbs = array(
    'Product',
    'Detail'
);

$count_review = 0;
$total_star = 0;
$avg_rating = 0.0;
$rate_value = 0;
if (!empty($review_data)) :
    foreach ($review_data as $value) :
        $count_review += 1;
        $total_star += $value['rating'];
    endforeach;
    $avg_rating = ($total_star / $count_review);
    $rate_value = (($avg_rating) / 5) * 100;
endif;
?>

<style>
    /* Rate Star*/
    .result-container {
        width: 100px;
        height: 22px;
        background-color: #ccc;
        vertical-align: middle;
        display: inline-block;
        position: relative;
        top: -4px;
    }

    .rate-stars {
        width: 100px;
        height: 22px;
        background: url(img/rate-stars.png) no-repeat;
        background-size: cover;
        position: absolute;
    }

    .rate-bg {
        height: 22px;
        background-color: #ffbe10;
        position: absolute;
    }

    /* Rate Star Ends*/

    /* Display rate count */
    .reviewCount,
    .reviewScore {
        font-size: 14px;
        color: #666666;
        margin-left: 5px;
    }

    .reviewScore {
        font-weight: 600;
    }
</style>
<link rel="stylesheet" href="<?= get_BaseUrl(); ?>/css/review-product.css">

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <?php $this->widget('application.widgets.sidebar_left'); ?>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="product-images">
                            <div class="product-main-img">
                                <img id='imgProduct<?= $data->id ?>' src="<?= get_BaseUrl()  . $data->image ?>" alt="">
                            </div>

                            <div class="product-gallery">
                                <img src="/img/product-thumb-1.jpg" alt="">
                                <img src="/img/product-thumb-2.jpg" alt="">
                                <img src="/img/product-thumb-3.jpg" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="product-inner">
                            <h2 class="product-name"><span id="product_name_for_modal"><span id="product_name_for_modal_<?= $data->id ?>"><?= $data->name ?></span></span></h2>
                            <div style="margin-top: 10px">
                                <div class="result-container">
                                    <div class="rate-bg" style="width:<?php echo $rate_value; ?>%">
                                    </div>
                                    <div class="rate-stars"><img src="<?= get_BaseUrl(); ?>/images/rating_star.png" alt=""></div>
                                </div>
                                <span class="reviewScore"><?php echo substr($avg_rating, 0, 3); ?></span><span class="reviewCount">(<?php echo $count_review; ?> reviews)</span>
                            </div>
                            <hr>
                            <div class="product-inner-price">
                                <ins><span id="price_add_cart_<?= $data->id ?>"><?= get_price_apply_i18n($data->price) ?></span></ins> <del>0.00</del>
                            </div>

                            <form action="" class="cart">
                                <div class="quantity">
                                    <input type="button" id="minus_quality_input_<?= $data->id ?>" class="minus" value="-" onclick="minusCartItemDetail(<?= $data->id ?>)">
                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" id="quantity_for_product" name="quantity" min="1" step="1">
                                    <input type="button" onclick="plusCartItemDetail(<?= $data->id  ?>)" class="plus" value="+">

                                </div>
                                <a class="add_to_cart_button" onclick="addToCartDetail(<?= $data->id ?>)" href="javascript:voice(0);">Add to cart</a>
                            </form>

                            <div class="product-inner-category">
                                <p>Category: <a href=""><?= $cate_data->name ?></a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div role="tabpanel">
                    <ul class="product-tab" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                            <h2>Product Description</h2>
                            <?= $data->description ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <div style="margin-top: 10px">
                                <div class="result-container">
                                    <div class="rate-bg" style="width:<?php echo $rate_value; ?>%">
                                    </div>
                                    <div class="rate-stars"><img src="<?= get_BaseUrl(); ?>/images/rating_star.png" alt=""></div>
                                </div>
                                <span class="reviewScore"><?php echo substr($avg_rating, 0, 3); ?></span><span class="reviewCount">(<?php echo $count_review; ?> reviews)</span>
                            </div>

                            <h2 style="padding-top: 15px;">Reviews</h2>
                            <div class="submit-review">
                                <?php if (Yii::app()->user->isGuest) { ?>
                                    <p><label for="name">Name</label> <input id="input_name" name="name" type="text"></p>
                                    <p><label for="email">Email</label> <input id="input_email" name="email" type="email"></p>
                                <?php } else { ?>
                                    <input id="input_name" name="name" value="<?= Yii::app()->user->currentUserInfo['username'] ?>" type="hidden">
                                    <input id="input_email" name="email" value="<?= Yii::app()->user->currentUserInfo['email'] ?>" type="hidden">
                                    <p class="woocommerce-info">You are logged in with the user <span style="color: #80a3d6;"><?= Yii::app()->user->currentUserInfo['username'] ?></span>. Do you want <a href="/site/logout">Logout</a> ?
                                    </p>
                                <?php } ?>
                                <div class="rating-chooser">
                                    <p>Your rating</p>

                                    <section class='rating-widget'>
                                        <!-- Rating Stars Box -->
                                        <div class='rating-stars text-center'>
                                            <ul id='stars'>
                                                <li class='star' title='Poor' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Fair' data-value='2'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Good' data-value='3'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Excellent' data-value='4'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='WOW!!!' data-value='5'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class='success-box'>
                                            <div class='clearfix'></div>
                                            <div class='text-message'></div>
                                            <div class='clearfix'></div>
                                        </div>
                                    </section>

                                </div>
                                <br>
                                <p><label for="review">Your review</label> <textarea id="input_content" name="review" id="" cols="30" rows="10"></textarea></p>
                                <div id="result-comment-notice">
                                    <p>
                                        <?php if (Yii::app()->cache->get('result_review_product'))
                                            echo Yii::app()->cache->get('result_review_product'); ?>
                                    </p>
                                </div>
                                <p><input type="submit" onclick="addNewReview(<?= $data->id  ?>)" value="Submit"></p>
                            </div>

                            <?php if (!empty($review_data)) : ?>
                                <!-- Contenedor Principal -->
                                <div class="comments-container" id="result-comment">
                                    <ul id="comments-list" class="comments-list">
                                        <!-- <li>
                                        <div class="comment-main-level">
                                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                                    <span>hace 20 minutos</span>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="comments-list reply-list">
                                            <li>
                                                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                                                        <span>hace 10 minutos</span>
                                                        <i class="fa fa-reply"></i>
                                                        <i class="fa fa-heart"></i>
                                                    </div>
                                                    <div class="comment-content">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                                        <span>hace 10 minutos</span>
                                                        <i class="fa fa-reply"></i>
                                                        <i class="fa fa-heart"></i>
                                                    </div>
                                                    <div class="comment-content">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li> -->

                                        <?php foreach ($review_data as $value) : ?>
                                            <li>
                                                <div class="comment-main-level">
                                                    <!-- Avatar -->
                                                    <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                                    <!-- Contenedor del Comentario -->
                                                    <div class="comment-box">
                                                        <div class="comment-head">
                                                            <h6 class="comment-name"><a href="#"><?= $value['name'] ?></a></h6>
                                                            <span><?= time_elapsed_string($value['create_time']) ?></span>

                                                            <?php
                                                            for ($i = 1; $i <= 5 - $value['rating']; $i++) {
                                                                echo '<i class="fa fa-star"></i>';
                                                            }
                                                            for ($i = 1; $i <= $value['rating']; $i++) {
                                                                echo '<i class="fa fa-star" style="color:#E6E33A"></i>';
                                                            } ?>

                                                        </div>
                                                        <div class="comment-content">
                                                            <?= $value['content'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="related-products-wrapper">
                    <h2 class="related-products-title">Related Products</h2>
                    <div class="related-products-carousel">
                        <?php foreach ($related_data as $value) : ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img id="imgProduct<?= $value->id ?>" src="<?= get_BaseUrl() . $value->image ?>" alt="">
                                    <div class="product-hover">
                                        <a href="javascript:voice(0);" onclick="addToCart(<?= $value->id ?>)" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="<?= $value->id ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="<?= $value->id ?>" id="product_name_for_modal_<?= $value->id ?>"><?= $value->name ?></a></h2>

                                <div class="product-carousel-price">
                                    <ins id="price_add_cart_<?= $value->id ?>"><?= get_price_apply_i18n($value->price) ?></ins> <del>$100.00</del>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= get_BaseUrl(); ?>/js/jquery2.1.1.min.js"></script>
<script>
    let value_rating_star = 0;
    $('.success-box').hide();
    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function() {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e) {
            if (e < onStar) {
                $(this).addClass('hover');
            } else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function() {
        $(this).parent().children('li.star').each(function(e) {
            $(this).removeClass('hover');
        });
    });

    /* 2. Action to perform on click */
    $('#stars li').on('click', function() {
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rate this " + ratingValue + " stars.";
        } else {
            msg = "We will improve ourselves. You rate this " + ratingValue + " stars.";
        }
        responseMessage(msg);
        value_rating_star = ratingValue;
        console.log(value_rating_star);
    });


    function responseMessage(msg) {
        $('.success-box').show();
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }

    function plusCartItemDetail(id) {
        const total_qty = new Number($('#quantity_for_product').val());
        $('#quantity_for_product').val((total_qty + 1));
    }

    function minusCartItemDetail(id) {
        const total_qty = new Number($('#quantity_for_product').val());
        $('#quantity_for_product').val((total_qty - 1));
    }

    function addNewReview(id) {
        name = $('#input_name').val();
        email = $('#input_email').val();
        content = $('textarea#input_content').val();
        $.post(url + '/review/add', {
            'name': name,
            'email': email,
            'content': content,
            'product_id': id,
            'rating_star': value_rating_star,
        }, function(data) {
            $('#result-comment-notice').load(url + '<?= $_SERVER['REQUEST_URI'] ?> #result-comment-notice');
            if (data != '') {
                $('#input_name').val('');
                $('#input_email').val('');
                $('#input_content').attr('');
                $('textarea#input_content').val('');
                $('#result-comment').load(url + '<?= $_SERVER['REQUEST_URI'] ?> #result-comment');
            }
        });
    }
</script>