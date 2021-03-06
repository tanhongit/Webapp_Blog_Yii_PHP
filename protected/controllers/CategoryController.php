<?php

class CategoryController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

    /**
     * show list product
     * @return void
     */
	public function actionIndex()
	{
		// get value in url
		isset($_REQUEST['page']) && $params = $_REQUEST['page'];
		$page = (isset($params) ? $params - 1 : 0);

		//get count
		$count = Product::model()->getTotalRecord();

		//count page
		$pages = new CPagination($count);
		$per_page = Yii::app()->params['pager_product']; //Required config params in main.php
		$pages->setPageSize($per_page);

		$data = Product::model()->getAllUsePagination($page, $per_page);

		$this->render(
			'index',
			array(
				'data' => $data,

				//div Paging navigation
				'page_size' => $per_page,
				'pages' => $pages,
				'item_count' => $count,
			)
		);
	}

	public function actionList($id)
	{
		// get value in url
		isset($_REQUEST['page']) && $params = $_REQUEST['page'];
		$page = (isset($params) ? $params - 1 : 0);

		//get count
		$count = Product::model()->getTotalRecordByCategory($id);

		//count page
		$pages = new CPagination($count);
		$per_page = Yii::app()->params['pager']; //Required config params in main.php
		$pages->setPageSize($per_page);

		$data = Product::model()->getByCategoryPagination($id, $page, $per_page);

		$category_name = Category::model()->getByID($id)['name'];

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
		); // app//category/list/2
	}
	public function actionView()
	{
		$test_request_url = explode('/', get_request_url());
		$pop_array_url = array_pop($test_request_url);
		$data_slug = Slug::model()->getBySlug($pop_array_url);

		$id = 0;

		if (!empty($data_slug)) {
			foreach ($data_slug as $value) {
				$id = $value['category_id'];
			}
		}

		// get value in url
		isset($_REQUEST['page']) && $params = $_REQUEST['page'];
		$page = (isset($params) ? $params - 1 : 0);

		//get count
		$count = Product::model()->getTotalRecordByCategory($id);

		//count page
		$pages = new CPagination($count);
		$per_page = Yii::app()->params['pager']; //Required config params in main.php
		$pages->setPageSize($per_page);

		$data = Product::model()->getByCategoryPagination($id, $page, $per_page);

		$category_name = Category::model()->getByID($id)['name'];

		$this->render(
			'view',
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
