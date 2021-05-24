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

	public function actionList()
	{
		$id = $_REQUEST['id'];
		$data = Product::getProductByCategory($id);

		$this->render('list', array('data' => $data)); // app//product/list?id=2
	}

	// public function actionList()
	// {
	// 	$data = Product::getProductHomePage();

	// 	$this->render('list', array('data' => $data));
	// }
}
