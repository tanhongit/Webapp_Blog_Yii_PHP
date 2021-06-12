<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ForgotPasswordController extends Controller
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

	public function actionRequest()
	{
		if (!empty(Yii::app()->request->getParam('forgot_mail'))) {
			$email = Yii::app()->request->getParam('forgot_mail');

			Yii::app()->session['input_forgot_password'] = $email;

			$result_data_email = User::model()->getByEmail($email);

			if (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
				Yii::app()->session['result_forgot_password'] = "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
			} elseif (empty($result_data_email) || !isset($result_data_email)) {
				Yii::app()->session['result_forgot_password'] = "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này không có người dùng và không tồn tại trong máy chủ. Vui lòng nhập lại Email khác. <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='/'>Đến Trang chủ</a></div></div>";
			} else {
				$users = User::model()->getAll();
				foreach ($users as $user) {
					if ($user['email'] == $email) {
						// $verification_Code = $user['verificationCode'];
						$verification_Code = $user['verificationCode'];
						$username = $user['username'];
						break;
					}
				}

				include 'protected/libs/setting_mail.php';
				$mail = new PHPMailer(true);
				try {
					$verificationLink = get_site_url() . "/forgotPassword/result?code=" . $verification_Code;
					//content
					$htmlStr = "";
					$htmlStr .= "Xin chào <b>" . $username . '</b> (' . $email . "),<br /><br />";
					$htmlStr .= "Chào mừng bạn đến WEBAPP YII.<br /><br /><br />";
					$htmlStr .= "Vui lòng truy cập tại link sau để xác thực tài khoản và bắt đầu đổi mật khẩu mới.<br><br>";
					$htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>Change New Password</a><br /><br /><br />";
					$htmlStr .= "Cảm ơn bạn đã tham gia !<br><br>";
					$htmlStr .= "Trân trọng,<br />";
					$htmlStr .= "<a href='#' target='_blank'>By WEBAPP YII</a><br />";
					//Server settings
					$mail->CharSet = "UTF-8";
					$mail->SMTPDebug = 0; // Enable verbose debug output (0 : ko hiện debug, 1 hiện)
					$mail->isSMTP(); // Set mailer to use SMTP
					$mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true; // Enable SMTP authentication
					$mail->Username = SMTP_UNAME; // SMTP username
					$mail->Password = SMTP_PWORD; // SMTP password
					$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
					$mail->Port = SMTP_PORT; // TCP port to connect to
					//Recipients
					$mail->setFrom(SMTP_UNAME, "WEBAPP YII");
					$mail->addAddress($email, $email);     // Add a recipient | name is option tên người nhận
					$mail->addReplyTo(SMTP_UNAME, 'WEBAPP YII');
					//$mail->addCC('CCemail@gmail.com');
					//$mail->addBCC('BCCemail@gmail.com');
					$mail->isHTML(true); // Set email format to HTML
					$mail->Subject = 'Forgot Password | WEBAPP YII | Reset your Password | By TanHongIT';
					$mail->Body = $htmlStr;
					$mail->AltBody = $htmlStr; //None HTML
					$result = $mail->send();
					if (!$result) {
						$error = "Có lỗi xảy ra trong quá trình gửi mail";
					}
				} catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}
				Yii::app()->session['result_forgot_password'] = "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Bạn sẽ nhận được tin nhắn Email xác nhận đổi mật khẩu với email mà bạn vừa nhập.<br><br> Vui lòng đến hộp thư và kiểm tra tin nhắn và xác nhận liên kết đổi mật khẩu ở đó!!</div></div>";
			}
		}
	}

	public function actionResult()
	{
		if (!empty($_GET['code'])) {
			$users = User::model()->getAll();
			$verify_id_user = 0;
			foreach ($users as $user) {
				if ($user['verificationCode'] == $_GET['code']) {
					$verify_id_user = 1;
					$user_id = $user['id'];
				}
			}
			if ($verify_id_user != 1) {
				Yii::app()->cache->set('result_code_forgot', "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>Oh No!</strong> Link xác nhận tài khoản để đổi mật khẩu của bạn không đúng. Vui lòng kiểm tra lại.</div></div>", 20);
			} else {
				header('location:' . get_site_url() . "/forgotPassword/change?id=" . $user_id);
			}
		} else {
			Yii::app()->cache->set('result_code_forgot', "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>Oh No!</strong> Link không tồn tại. Vui lòng kiểm tra lại.</div></div>", 20);
		}
		$this->render('result', array());
	}

	public function actionChange()
	{
		if (isset($_GET['id'])) $user_id = $_GET['id'];
		$user_info = User::model()->getByID($user_id);
		$this->render('change', array(
			'user_info' => $user_info,
		));
	}
}
