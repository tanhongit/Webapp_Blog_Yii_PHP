<?php

class ShoppingCartController extends Controller
{
	public function actionIndex()
	{
		$data = Yii::app()->session['cart'];
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
	}
}
