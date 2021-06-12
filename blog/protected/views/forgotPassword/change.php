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
								<div class="woocommerce-billing-fields">
									<h3>Enter the new password</h3>
									<p id="billing_last_name_field" class="form-row form-row-first validate-required">
										<label class="" for="forgot_mail">Email <abbr title="required" class="required">*</abbr>
										</label>
										<input type="text" required value="<?= Yii::app()->session['input_forgot_password'] ?>" placeholder="abc@mail.com" id="forgot_mail" name="forgot_mail" class="input-text ">
									</p>
                                    <h3></h3>
                                    <p id="billing_last_name_field" class="form-row form-row-first validate-required">
										<label class="" for="forgot_mail">Email <abbr title="required" class="required">*</abbr>
										</label>
										<input type="text" required value="<?= Yii::app()->session['input_forgot_password'] ?>" placeholder="abc@mail.com" id="forgot_mail" name="forgot_mail" class="input-text ">
									</p>
								</div>
								<div id="result_component">
									<?php
									Yii::app()->session['result_forgot_password'] ? $result = Yii::app()->session['result_forgot_password'] : $result = "";
									echo $result;
									?>
								</div>
								<div class="form-row place-order" style="text-align: center;">
									<input type="submit" onclick="requestEmail()" data-value="Apply" value="Submit" id="from_price_search" name="from_price_search" class="button alt">
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
	function requestEmail() {
		var forgot_mail = $('#forgot_mail').val();
		$.post(url + '/forgotPassword/request', {
			'forgot_mail': forgot_mail,
		}, function(data) {
			$('#result_component').text(data);
			$('#result_component').load(url + '<?= $_SERVER['REQUEST_URI'] ?> #result_component');
		});
	}
</script>