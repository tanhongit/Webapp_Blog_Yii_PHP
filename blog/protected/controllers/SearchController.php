<?php

class SearchController extends Controller
{
	public function actionIndex()
	{
		// get value in url
		isset($_REQUEST['page']) && $params = $_REQUEST['page'];
		$page = (isset($params) ? $params - 1 : 0);

		isset($_GET['keyword'])
			? $keyword = $_GET['keyword']
			: $keyword = "";

		//get count
		$count = Product::model()->getAllSearch($keyword);

		//count page
		$pages = new CPagination($count);
		$per_page = 4; //Required config params in main.php
		$pages->setPageSize($per_page);

		$data = Product::model()->searchUsePagination($keyword, $page, $per_page);

		$this->render(
			'index',
			array(
				'data' => $data,

				//div Paging navigation
				'page_size' => $per_page,
				'pages' => $pages,
				'item_count' => $count,
				'keyword' => $keyword,
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
}
