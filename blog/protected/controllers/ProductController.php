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
	/** The transmission parameter is required with the same name as the parameter called in the rule url manager config, on the main.php file config  */
	public function actionList3($id)
	{
		//Required config rule url manager in main.php
		// 'product/list/<id:\d+>',
		$data = Product::getProductByCategory($id);

		$this->render('list', array('data' => $data)); // app//product/list/2
	}

	/** show data product by category enabled SEO friendly URLs and echo statement in the view */
	/** The transmission parameter is required with the same name as the parameter called in the rule url manager config, on the main.php file config  */
	public function actionList($id)
	{
		// get value in url
		isset($_REQUEST['page']) && $params = $_REQUEST['page'];
		$page = (isset($params) ? $params - 1 : 0);

		//get count
		$count = Product::getTotalProductRecordByCategory($id);

		//count page
		$pages = new CPagination($count);
		$per_page = Yii::app()->params['pager']; //Required config params in main.php
		$pages->setPageSize($per_page);

		$data = Product::getProductByCategoryUsePagi($id, $page, $per_page);

		$this->render(
			'list',
			array(
				'data' => $data,

				//div Paging navigation
				'page_size' => $per_page,
				'pages' => $pages,
				'item_count' => $count,
			)
		); // app//product/list/2
	}

	public function actionTestCache()
	{
		isset($_REQUEST['go']) && Product::testUsingQueryCaching();
		$this->render('testCache');
	}
}
