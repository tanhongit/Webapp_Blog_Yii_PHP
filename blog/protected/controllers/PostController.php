<?php

class PostController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionView()
	{
		$post_id = getIDBySlugView('view', 'post');

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
