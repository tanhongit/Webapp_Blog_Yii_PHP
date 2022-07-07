<?php
require_once('protected/scripts/globals.php');
$this->breadcrumbs = array(
    'Post',
    'View'
);
?>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <?php $this->widget('application.widgets.sidebar_left'); ?>

            <div class="col-md-8">
                <h2><?=$data->title?></h2>
                <div style="margin-top: 10px">
                <?=$data->content?>
                </div>
            </div>
        </div>
    </div>
</div>