<?php
/* @var $this ProductController */
require_once('protected/scripts/globals.php');
$this->breadcrumbs = array(
    'Forgot Password',
    'Change'
);
?>

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Change Password</h2>
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <div id="customer_details" class="col2-set">
                                <div class="woocommerce-billing-fields" id="form_change_pass">
                                    <p id="billing_last_name_field" class="form-row form-row-first validate-required">
                                        <label class="" for="new_password">Enter the new password <abbr title="required" class="required">*</abbr>
                                        </label>
                                        <input type="password" required value="" style="width: 100%;" placeholder="password" id="new_password" name="new_password" class="input-text ">
                                    </p>
                                    <p id="billing_last_name_field" class="form-row form-row-first validate-required">
                                        <label class="" for="confirm_new_password">Confirm new password <abbr title="required" class="required">*</abbr>
                                        </label>
                                        <input type="password" required value="" style="width: 100%;" placeholder="password" id="confirm_new_password" name="confirm_new_password" class="input-text ">
                                    </p>
                                </div>
                                <?php foreach ($user_info as $user) {
                                    $user_id =  $user['id'];
                                } ?>
                                <input type="hidden" id="user_id" name="user_id" value="<?= $user_id ?>">
                                <div id="result_component">
                                    <?php if (Yii::app()->cache->get('result_change_pass'))
                                        echo Yii::app()->cache->get('result_change_pass'); ?>
                                </div>
                                <div class="form-row place-order" style="text-align: center;">
                                    <input type="submit" onclick="requestPassword()" data-value="Apply" value="Submit" id="from_price_search" name="from_price_search" class="button alt">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function requestPassword() {
        var new_password = $('#new_password').val();
        var confirm_new_password = $('#confirm_new_password').val();
        var user_id = $('#user_id').val();
        $.post(url + '/forgotPassword/handle', {
            'new_password': new_password,
            'confirm_new_password': confirm_new_password,
            'user_id': user_id,
        }, function(data) {
            $('#form_change_pass').load(url + '<?= $_SERVER['REQUEST_URI'] ?> #form_change_pass');
            $('#result_component').load(url + '<?= $_SERVER['REQUEST_URI'] ?> #result_component');
        });
    }
</script>