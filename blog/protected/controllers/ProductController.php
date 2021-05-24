<?php

class ProductController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
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

	/** get all product data by category  */
	public function actionList1()
	{
		$data = Product::getProductHomePage();

		$this->render('list', array('data' => $data));
	}

	/** get product data by category using request id url . Ex: app//product/list?id=2 */
	public function actionList2()
	{
		$id = $_REQUEST['id'];
		$data = Product::getProductByCategory($id);

		$this->render('list', array('data' => $data)); // Ex: app//product/list?id=2
	}


	/** show data product by category enabled SEO friendly URLs and echo statement in the view */
	public function actionList($id)
	{
		//Required config rule url manager in main.php
		// 'product/list/<id:\d+>',
		$data = Product::getProductByCategory($id);

		$this->render('list', array('data' => $data)); // app//product/list/2
	}
}
