<?php
require_once('protected/scripts/globals.php');
$this->breadcrumbs = array(
    'Product',
    'Detail'
);
?>
<style>
    /* review */
    /**
 * Oscuro: #283035
 * Azul: #03658c
 * Detalle: #c7cacb
 * Fondo: #dee1e3
 ----------------------------------*/
    * {
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    a {
        color: #03658c;
        text-decoration: none;
    }

    ul {
        list-style-type: none;
    }

    body {
        font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
    }

    /** ====================
* Lista de Comentarios
=======================*/
    .comments-container {
        margin: 60px auto 15px;
        width: 768px;
    }

    .comments-container h1 {
        font-size: 36px;
        color: #283035;
        font-weight: 400;
    }

    .comments-container h1 a {
        font-size: 18px;
        font-weight: 700;
    }

    .comments-list {
        margin-top: 30px;
        position: relative;
    }

    /**
* Lineas / Detalles
-----------------------*/
    .comments-list:before {
        content: '';
        width: 2px;
        height: 100%;
        background: #c7cacb;
        position: absolute;
        left: 32px;
        top: 0;
    }

    .comments-list:after {
        content: '';
        position: absolute;
        background: #c7cacb;
        bottom: 0;
        left: 27px;
        width: 7px;
        height: 7px;
        border: 3px solid #dee1e3;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .reply-list:before,
    .reply-list:after {
        display: none;
    }

    .reply-list li:before {
        content: '';
        width: 60px;
        height: 2px;
        background: #c7cacb;
        position: absolute;
        top: 25px;
        left: -55px;
    }


    .comments-list li {
        margin-bottom: 15px;
        display: block;
        position: relative;
    }

    .comments-list li:after {
        content: '';
        display: block;
        clear: both;
        height: 0;
        width: 0;
    }

    .reply-list {
        padding-left: 88px;
        clear: both;
        margin-top: 15px;
    }

    /**
* Avatar
---------------------------*/
    .comments-list .comment-avatar {
        width: 65px;
        height: 65px;
        position: relative;
        z-index: 99;
        float: left;
        border: 3px solid #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .comments-list .comment-avatar img {
        width: 100%;
        height: 100%;
    }

    .reply-list .comment-avatar {
        width: 50px;
        height: 50px;
    }

    .comment-main-level:after {
        content: '';
        width: 0;
        height: 0;
        display: block;
        clear: both;
    }

    /**
* Caja del Comentario
---------------------------*/
    .comments-list .comment-box {
        width: 680px;
        float: right;
        position: relative;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
    }

    .comments-list .comment-box:before,
    .comments-list .comment-box:after {
        content: '';
        height: 0;
        width: 0;
        position: absolute;
        display: block;
        border-width: 10px 12px 10px 0;
        border-style: solid;
        border-color: transparent #FCFCFC;
        top: 8px;
        left: -11px;
    }

    .comments-list .comment-box:before {
        border-width: 11px 13px 11px 0;
        border-color: transparent rgba(0, 0, 0, 0.05);
        left: -12px;
    }

    .reply-list .comment-box {
        width: 610px;
    }

    .comment-box .comment-head {
        background: #FCFCFC;
        padding: 10px 12px;
        border-bottom: 1px solid #E5E5E5;
        overflow: hidden;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
    }

    .comment-box .comment-head i {
        float: right;
        margin-left: 14px;
        position: relative;
        top: 2px;
        color: #A6A6A6;
        cursor: pointer;
        -webkit-transition: color 0.3s ease;
        -o-transition: color 0.3s ease;
        transition: color 0.3s ease;
    }

    .comment-box .comment-head i:hover {
        color: #03658c;
    }

    .comment-box .comment-name {
        color: #283035;
        font-size: 14px;
        font-weight: 700;
        float: left;
        margin-right: 10px;
    }

    .comment-box .comment-name a {
        color: #283035;
    }

    .comment-box .comment-head span {
        float: left;
        color: #999;
        font-size: 13px;
        position: relative;
        top: 1px;
    }

    .comment-box .comment-content {
        background: #FFF;
        padding: 12px;
        font-size: 15px;
        color: #595959;
        -webkit-border-radius: 0 0 4px 4px;
        -moz-border-radius: 0 0 4px 4px;
        border-radius: 0 0 4px 4px;
    }

    .comment-box .comment-name.by-author,
    .comment-box .comment-name.by-author a {
        color: #03658c;
    }

    .comment-box .comment-name.by-author:after {
        content: 'autor';
        background: #03658c;
        color: #FFF;
        font-size: 12px;
        padding: 3px 5px;
        font-weight: 700;
        margin-left: 10px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    /** =====================
* Responsive
========================*/
    @media only screen and (max-width: 766px) {
        .comments-container {
            width: 480px;
        }

        .comments-list .comment-box {
            width: 390px;
        }

        .reply-list .comment-box {
            width: 320px;
        }
    }
</style>
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
                            <h2>Reviews</h2>
                            <div class="submit-review">
                                <p><label for="name">Name</label> <input id="input_name" name="name" type="text"></p>
                                <p><label for="email">Email</label> <input id="input_email" name="email" type="email"></p>
                                <div class="rating-chooser">
                                    <p>Your rating</p>

                                    <div class="rating-wrap-post">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p><label for="review">Your review</label> <textarea id="input_content" name="review" id="" cols="30" rows="10"></textarea></p>

                                <p>
                                    <?php if (Yii::app()->session['result_review_product'])
                                        echo Yii::app()->session['result_review_product']; ?>
                                </p>
                                <p><input type="submit" onclick="addNewReview(<?= $data->id  ?>)" value="Submit"></p>
                            </div>
                            <!-- Contenedor Principal -->
                            <div class="comments-container" id="result-comment">
                                <ul id="comments-list" class="comments-list">
                                    <li>
                                        <div class="comment-main-level">
                                            <!-- Avatar -->
                                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                            <!-- Contenedor del Comentario -->
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
                                        <!-- Respuestas de los comentarios -->
                                        <ul class="comments-list reply-list">
                                            <li>
                                                <!-- Avatar -->
                                                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                                <!-- Contenedor del Comentario -->
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
                                                <!-- Avatar -->
                                                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                                <!-- Contenedor del Comentario -->
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
                                    </li>

                                    <?php foreach ($review_data as $value) : ?>
                                        <li>
                                            <div class="comment-main-level">
                                                <!-- Avatar -->
                                                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name"><a href="#"><?= $value['name'] ?></a></h6>
                                                        <span>hace 10 minutos</span>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
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
<script>
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
        }, function(data) {
            $('#input_name').val('');
            $('#input_email').val('');
            $('#input_content').attr('');
            $('textarea#input_content').val('');
            $('#result-comment').load(url + '<?= $_SERVER['REQUEST_URI'] ?> #result-comment');
        });
    }
</script>