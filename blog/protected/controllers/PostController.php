<?php

class PostController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionView()
	{
		$test_request_url = explode('/', get_request_url());
		$pop_array_url = array_pop($test_request_url);
		$data_slug = Slug::model()->getBySlug($pop_array_url);

		$post_id = 0;

		if (!empty($data_slug)) {
			foreach ($data_slug as $value) {
				$post_id = $value['post_id'];
			}
		}

		$data = Post::model()->getByID($post_id);

		$this->render('view', array(
			'data' => $data,
		));
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
