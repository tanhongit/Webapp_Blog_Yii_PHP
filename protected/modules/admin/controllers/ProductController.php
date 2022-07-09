<?php

class ProductController extends Controller
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
		$model = new Product;
        $slugModel = new Slug;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$category = Category::model()->getAll();
        $dataCategory = CHtml::listData($category, 'id', 'name');
        $dataAuthor = CHtml::listData(User::model()->getAll(), 'id', 'username');
		$path = Yii::getPathOfAlias('webroot') . '/uploads';

		if (isset($_POST['Product'])) {
			$model->attributes = $_POST['Product'];

			if (empty($_POST['Product']['create_time'])) {
				$model->create_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			}
			if (empty($_POST['Product']['update_time'])) {
				$model->update_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			}

			$image = CUploadedFile::getInstance($model, 'image'); //image is the name input form
			$image->saveAs($path . '/' . time() . '_' . $image->name);
			$model->image = "/uploads/" . time() . '_' . $image->name;

			if ($model->save())
                $slugModel = Slug::model()->createSlug($_POST, $model);
				$this->redirect(array('view', 'id' => $model->id));
		}
		$this->render('create', array(
			'model' => $model,
			'dataCategory' => $dataCategory,
            'dataAuthor' => $dataAuthor,
            'slugModel' => $slugModel,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$category = Category::model()->getAll();
        $dataCategory = CHtml::listData($category, 'id', 'name');
        $dataAuthor = CHtml::listData(User::model()->getAll(), 'id', 'username');

        $slugModel = Slug::model()->getByProductID($id);
        if (count($slugModel) > 0) {
            $slugModel = $slugModel[0];
        } else {
            $slugModel = new Slug;
        }

		if (isset($_POST['Product'])) {
			$model->attributes = $_POST['Product'];
			$model->update_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			if ($model->save()) {
                $slugModel = Slug::model()->updateSlug($id, $_POST);
                $this->redirect(array('view', 'id' => $model->id));
            }
		}

		$this->render('update', array(
			'model' => $model,
            'dataCategory' => $dataCategory,
            'dataAuthor' => $dataAuthor,
            'slugModel' => $slugModel,
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
		$dataProvider = new CActiveDataProvider('Product');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Product('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Product']))
			$model->attributes = $_GET['Product'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Product the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Product::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
