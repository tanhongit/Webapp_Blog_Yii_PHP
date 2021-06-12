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
		$user_id = 0;
		$rating_star = Yii::app()->request->getParam('rating_star');

		if (!Yii::app()->user->isGuest) {
			$name = Yii::app()->user->currentUserInfo['username'];
			$email = Yii::app()->user->currentUserInfo['email'];
			$user_id = Yii::app()->user->currentUserInfo['id'];
		}

		if (empty($name) || empty($email)) {
			Yii::app()->cache->set('result_review_product', "<div style='padding-top: 200'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Trường Name/Email hiện đang rỗng hoặc không hợp lệ. Vui lòng thao tác lại.</div></div>", 20);
		} elseif (!isset($rating_star) || empty($rating_star) || $rating_star < 1) {
			Yii::app()->cache->set('result_review_product', "<div style='padding-top: 200'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Vui lòng thêm số sao đánh giá của bạn.</div></div>", 20);
		} elseif (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
			Yii::app()->cache->set('result_review_product', "<div style='padding-top: 200' ><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này không hợp lệ. Vui long nhập email khác.</div></div>", 20);
		} else {
			$modalReview = new Review;
			$modalReview->name = $name;
			$modalReview->email = $email;
			$modalReview->content = $content;
			$modalReview->product_id = $product_id;
			$modalReview->user_id = $user_id;
			$modalReview->rating = $rating_star;
			$modalReview->create_time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);

			$modalReview->save();
			Yii::app()->cache->set('result_review_product', "<div style='padding-top: 200'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Bạn đã để lại review thành công.<br><br> Vui lòng xem lại review của bạn bên dưới!!</div></div>", 20);
			echo 'done';
		}
	}
}
