<?php

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

		Yii::app()->session['cart'] && $data = Yii::app()->session['cart'];
		// print_r('<pre>');
		// print_r($data);die;
		$total_quality_cart = Cart::getTotalQualityProductCart();
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
			if($modalOrder->save()){
				//insert order detail
			}
		}
		$data = array();
		$this->render(
			'checkout',
			array(
				'data' => $data,
				'total_quality_cart' => $total_quality_cart,
			)
		);
	}
}
