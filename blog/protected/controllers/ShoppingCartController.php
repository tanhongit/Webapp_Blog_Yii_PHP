<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ShoppingCartController extends Controller
{
	public function actionIndex()
	{
		$data = array();
		Yii::app()->session['cart'] && $data = Yii::app()->session['cart'];
		// print_r('<pre>');
		// print_r($data);die;
		$total_quality_cart = Cart::getTotalQualityProductCart();

		$this->render(
			'index',
			array(
				'data' => $data,
				'total_quality_cart' => $total_quality_cart,
			)
		);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	public function actionAddCart()
	{
		$product_id = Yii::app()->request->getParam('product_id');
		Cart::addCart($product_id);
		// print_r('<pre>');
		// print_r(Yii::app()->session['cart']);
		$total_quality_cart = Cart::getTotalQualityProductCart();
		echo $total_quality_cart;
	}

	public function actionAddCartDetail()
	{
		$product_id = Yii::app()->request->getParam('product_id');
		$quantity = Yii::app()->request->getParam('quantity');
		Cart::addCart($product_id, $quantity);
		$total_quality_cart = Cart::getTotalQualityProductCart();
		echo $total_quality_cart;
	}

	public function actionUpdateItemCart()
	{
		$product_id = Yii::app()->request->getParam('product_id');
		$quality = Yii::app()->request->getParam('quality');
		Cart::updateItemCart($product_id, $quality);

		$total_quality_cart = Cart::getTotalQualityProductCart();
		echo $total_quality_cart; //for show  total count quality cart
	}

	public function actionDeleteCartItem()
	{
		$product_id = Yii::app()->request->getParam('product_id');
		Cart::deleteCartItem($product_id);

		$total_quality_cart = Cart::getTotalQualityProductCart();
		echo $total_quality_cart; //for show  total count quality cart
	}

	public function actionCheckOut()
	{
		//login
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}

		//checkout
		Yii::app()->session['cart'] && $data = Yii::app()->session['cart'];
		// print_r('<pre>');
		// print_r($data);die;
		$total_quality_cart = Cart::totalPriceCart();
		if (isset($_POST['woocommerce_checkout_place_order'])) {
			$modalOrder = new Order;
			$modalOrder->user_id = !Yii::app()->user->isGuest
				? Yii::app()->user->currentUserInfo['id']
				: 0;
			$modalOrder->order_date = date('Y-m-d H:i:s');
			$modalOrder->total_price = $total_quality_cart;
			$modalOrder->status = 1;
			$modalOrder->first_name = $_POST['billing_first_name'];
			$modalOrder->last_name = $_POST['billing_last_name'];
			$modalOrder->country = $_POST['billing_country'];
			$modalOrder->company_name = $_POST['billing_company'];
			$modalOrder->address_street = $_POST['billing_address_1'];
			$modalOrder->address_optional = $_POST['billing_address_2'];
			$modalOrder->city = $_POST['billing_city'];
			$modalOrder->email = $_POST['billing_email'];
			$modalOrder->postcode = $_POST['billing_postcode'];
			$modalOrder->phone = $_POST['billing_phone'];

			$modalOrder->ship_first_name = $_POST['shipping_first_name'];
			$modalOrder->ship_last_name = $_POST['shipping_last_name'];
			$modalOrder->ship_country = $_POST['shipping_country'];
			$modalOrder->ship_company_name = $_POST['shipping_company'];
			$modalOrder->ship_address_street = $_POST['shipping_address_1'];
			$modalOrder->ship_address_optional = $_POST['shipping_address_2'];
			$modalOrder->ship_city = $_POST['shipping_city'];
			$modalOrder->ship_postcode = $_POST['shipping_postcode'];
			$modalOrder->order_comments = $_POST['order_comments'];
			$modalOrder->ship_phone = $_POST['shipping_phone'];
			if ($modalOrder->save()) {
				//insert order detail
				$order_id = $modalOrder->id;
				foreach ($data as $key => $value) {
					$modalDetail = new OrderDetail;
					$modalDetail->order_id_id = $order_id;
					$modalDetail->product_id = $key;
					$modalDetail->price = $value['price'];
					$modalDetail->quantity = $value['quality'];
					$modalDetail->create_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
					if (!$modalDetail->save()) {
						//notice 
					} else {
						include 'protected/libs/setting_mail.php';
						$mail = new PHPMailer(true);
						try {
							//content
							$htmlStr = "hiiiiiiiiiiiiii";
							//Server settings
							$mail->CharSet = "UTF-8";
							$mail->SMTPDebug = 0; // Enable verbose debug output (0 : ko hiện debug, 1 hiện)
							$mail->isSMTP(); // Set mailer to use SMTP
							$mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
							$mail->SMTPAuth = true; // Enable SMTP authentication
							$mail->Username = SMTP_UNAME; // SMTP username
							$mail->Password = SMTP_PWORD; // SMTP password
							$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
							$mail->Port = SMTP_PORT; // TCP port to connect to
							//Recipients
							$mail->setFrom(SMTP_UNAME, "PHP TRAINING");
							$mail->addAddress('tan.nguyen@ceresolutions.com', 'tan.nguyen@ceresolutions.com');     // Add a recipient | name is option tên người nhận
							$mail->addReplyTo(SMTP_UNAME, 'PHP TRAINING');
							//$mail->addCC('CCemail@gmail.com');
							//$mail->addBCC('BCCemail@gmail.com');
							$mail->isHTML(true); // Set email format to HTML
							$mail->Subject = 'You have Change your Password | PHP TRAINING | By Tân TEAM D';
							$mail->Body = $htmlStr;
							$mail->AltBody = $htmlStr; //None HTML
							$result = $mail->send();
							if (!$result) {
								$error = "Có lỗi xảy ra trong quá trình gửi mail";
							}
						} catch (Exception $e) {
							echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
						}
					}
				}
			}
		}
		$data_cart = Yii::app()->session['cart'];
		$this->render(
			'checkout',
			array(
				'data_cart' => $data_cart,
				'model' => $model,
				'total_quality_cart' => $total_quality_cart,
			)
		);
	}

	public function actionAddCoupon()
	{
		if (empty(Yii::app()->session['cart'])) {
			Yii::app()->session['result_add_coupon'] = 'Your cart is currently empty';
		} else {
			$coupon_code = Yii::app()->request->getParam('coupon_code');
			Yii::app()->session['input_add_coupon'] = $coupon_code;
			$data_db = Coupon::getAllCoupon();
			$discount_price = 0.0;

			foreach ($data_db as $value) {
				if ($coupon_code == $value['code']) {

					if (empty($value['product_id']) || $value['product_id'] < 1) {
						$discount_price = $value['discount'];
						$check_status_apply_coupon = true;
					} else {
						$cart = Yii::app()->session['cart'];

						foreach ($cart as $value_cart) {
							if ($value['product_id'] != $value_cart['id']) {
								$check_status_apply_coupon = false;
							} else {
								$discount_price = $value['discount'] * $value_cart['quality'];
								$check_status_apply_coupon = true;
								break;
							}
						}
					}

					if ($check_status_apply_coupon == false) {
						Yii::app()->session['result_add_coupon'] = 'Discount coupon code does not apply to current products';
					} else {

						if (Yii::app()->params->the_coupon_1 != 'none') {
							$limit = true;
						} else {
							$limit = false;
							Controller::saveCouponParamCart($coupon_code);
						}

						if ($limit == true) {
							Yii::app()->session['result_add_coupon'] = 'The number of coupon code applications has reached the limit';
						} else {
							Yii::app()->session['cart_discount'] += $discount_price;

							Yii::app()->session['result_add_coupon'] = 'Discount coupon code applied successfully';
						}
					}
					break;
				} else {
					Yii::app()->session['result_add_coupon'] = 'This discount code has expired or is not valid';
				}
			}
		}
	}
}
