<?php
/* @var $this ProductController */
require_once('protected/scripts/globals.php');
$this->breadcrumbs = array(
    'Forgot Password',
);
?>
<br>
<div class="container">
    <div class="row">
        <?php if (Yii::app()->cache->get('result_code_forgot'))
            echo Yii::app()->cache->get('result_code_forgot'); ?>
    </div>
</div>