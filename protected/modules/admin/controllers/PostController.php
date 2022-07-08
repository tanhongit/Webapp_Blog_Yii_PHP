<?php

class PostController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	// public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array(
				'allow',  // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view'),
				'users' => array('*'),
			),
			array(
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create', 'update'),
				'users' => array('@'),
			),
			array(
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('admin', 'delete'),
				'users' => array('admin'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Post;
		$model_slug = new Slug;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$user = User::model()->getAll();
		// print_r($user);
		$data = CHtml::listData($user, 'id', 'username');

		if (isset($_POST['Post'])) {

			$model->attributes = $_POST['Post'];

			if (empty($_POST['Post[create_time]'])) {
				$model->create_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			}
			if (empty($_POST['Post[update_time]'])) {
				$model->update_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			}

			$model_slug->attributes = $_POST['Slug'];

			if ($model->save()) {
				$model_slug->post_id = $model->id;
				if (empty($_POST['Slug[slug]'])) {
					$model_slug->slug = slug($model->title);
				}
				$model_slug->save();
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array(
			'model' => $model,
			'data' => $data,
			'model_slug' => $model_slug,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$user = User::model()->getAll();

		$slug = Slug::model()->getByPostID($id);
		foreach ($slug as $value) {
			$slug_id = $value['id'];
		}

		$data = CHtml::listData($user, 'id', 'username');
		$model = $this->loadModel($id);

		$model_slug = Slug::model()->findByPk($slug_id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Post'])) {
			$model->attributes = $_POST['Post'];

			$model_slug->attributes = $_POST['Slug'];
			// $model_slug->slug = $_POST['Slug']['slug'];

			$the_slug = $_POST['Slug']['slug'];
			if (empty($the_slug)) {
				$the_slug = slug($_POST['Post']['title']);
			}
			foreach (Slug::model()->getAll() as $value) {
				if ($the_slug == $value['slug']) {
					
					$a_slug = $the_slug . '-' . 1;

					$array_slug = explode('-', $a_slug);
					$pop_array_url = array_pop($array_slug);

					$array_num = array();
					for ($i = 0; $i < 100; $i++) {
						$array_num[] = $i;
					}

					if (in_array(intval($pop_array_url), $array_num)) {
						$model_slug->slug = $the_slug . '-' . (intval($pop_array_url) + 1);
					} else $model_slug->slug = $a_slug;
				}
			}

			$model_slug->save();

			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('update', array(
			'model' => $model,
			'data' => $data,
			'model_slug' => $model_slug,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Post');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Post('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Post']))
			$model->attributes = $_GET['Post'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Post::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'post-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}