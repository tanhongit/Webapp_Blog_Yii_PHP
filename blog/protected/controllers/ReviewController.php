<?php

class ReviewController extends Controller
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

	public function actionAdd()
	{
		$name = Yii::app()->request->getParam('name');
		$email = Yii::app()->request->getParam('email');
		$content = Yii::app()->request->getParam('content');
		$product_id = Yii::app()->request->getParam('product_id');

		if (empty($name) || empty($email)) {
			Yii::app()->session['result_review_product'] = "<div style='padding-top: 200'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Trường Name/Email hiện đang rỗng hoặc không hợp lệ. Vui lòng thao tác lại.</div></div>";
		} elseif (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
			Yii::app()->session['result_review_product'] = "<div style='padding-top: 200' ><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này không hợp lệ. Vui long nhập email khác.</div></div>";
		} else {
			$modalReview = new Review;
			$modalReview->name = $name;
			$modalReview->email = $email;
			$modalReview->content = $content;
			$modalReview->product_id = $product_id;

			$modalReview->save();
			Yii::app()->session['result_review_product'] = "<div style='padding-top: 200'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Bạn đã để lại review thành công.<br><br> Vui lòng xem lại review của bạn bên dưới!!</div></div>";
		}
	}
}