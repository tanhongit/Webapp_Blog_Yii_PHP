<?php

class CategoryController extends Controller
{
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

		$category_name = Category::getCategoryByID($id)['name'];

		$this->render(
			'list',
			array(
				'data' => $data,

				//div Paging navigation
				'page_size' => $per_page,
				'pages' => $pages,
				'item_count' => $count,
				'category_name' => $category_name,
			)
		); // app//product/list/2
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
}
