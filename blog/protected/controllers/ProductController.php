<?php

class ProductController extends Controller implements ViewInterFace
{
	public function actionIndex()
	{
		// get value in url
		isset($_REQUEST['page']) && $params = $_REQUEST['page'];
		$page = (isset($params) ? $params - 1 : 0);

		//get count
		$count = Product::model()->model()->getTotalRecord();

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
		$data = Product::model()->getForHomePage();

		$this->render('list', array('data' => $data));
	}

	/** get product data by category using request id url . Ex: app//product/list?id=2 */
	public function actionList2()
	{
		$id = $_REQUEST['id'];
		$data = Product::model()->getByCategory($id);

		$this->render('list', array('data' => $data)); // Ex: app//product/list?id=2
	}


	/** show data product by category enabled SEO friendly URLs and echo statement in the view */
	/** The transmission parameter is required with the same name as the parameter called in the rule url manager config, on the main.php file config  */
	public function actionList3($id)
	{
		//Required config rule url manager in main.php
		// 'product/list/<id:\d+>',
		$data = Product::model()->getByCategory($id);

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
		); // app//product/list/2
	}

	public function actionTestCache()
	{
		isset($_REQUEST['go']) && Product::model()->productQueryCaching();
		$this->render('testCache');
	}

	public function actionTopView()
	{
		$data = Product::model()->getAllTopView();

		$this->render('topview', array('data' => $data)); // Ex: app//product/list?id=2
	}

	public function actionDetail()
	{
		$test_request_url = explode('/', get_request_url());
		$pop_array_url = array_pop($test_request_url);
		$data_slug = Slug::model()->getBySlug($pop_array_url);

		$id = 0;

		if (!empty($data_slug)) {
			foreach ($data_slug as $value) {
				$id = $value['product_id'];
			}
		}

		$data = Product::model()->getDetail($id);

		$category_id = $data->category_id;
		$cate_data = Category::model()->getByID($category_id);

		$related_data = Product::model()->getByCategory($category_id);

		$recent_data = Product::model()->getRecent();

		$recent_post_data = Post::model()->getRecent();

		$latest_data = Product::model()->getLatest();

		$review_data = Review::model()->getByProductID($id);

		$model = $this->loadModel($id);
		$model->view += 1;
		$model->save();

		$this->render('detail', array(
			'data' => $data,
			'cate_data' => $cate_data,
			'related_data' => $related_data,
			'recent_data' => $recent_data,
			'recent_post_data' => $recent_post_data,
			'latest_data' => $latest_data,
			'review_data' => $review_data,
		));
	}
	public function loadModel($id)
	{
		$model = Product::model()->model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}
}
