<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	// public $layout = '//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();

	/**
	 * set the application language or the theme according to the choice of the user
	 */
	public function actionSettings()
	{
		// //Internationalization by alias domain
		// $test_main_url = explode('.', $_SERVER['HTTP_HOST']);
		// !empty($test_main_url[2]) && Yii::app()->user->setState('applicationLanguage', $test_main_url[2]);

		// //Internationalization with custom by client users
		// isset($_POST['language']) && Yii::app()->user->setState('applicationLanguage', $_POST['language']);

		$test_main_url = explode('.', $_SERVER['HTTP_HOST']);
		$pop_array_url = array_pop($test_main_url);
		if (in_array($pop_array_url, language_codes())) {
			Yii::app()->user->setState('applicationLanguage', $pop_array_url);
		} elseif (isset($_POST['language'])) {
			Yii::app()->user->setState('applicationLanguage', $_POST['language']);
		}
	}

	public function showDateTimeFormat()
	{
		$time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
		$app = Yii::app();
		// $app->language = 'fr_fr'; // yii uses all lowercase

		// echo $app->dateFormatter->formatDateTime($time, 'full', null);
		echo $app->dateFormatter->formatDateTime($time, 'full', 'full');
	}

	public function showDateFormat() 
	{
		$time = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
		$app = Yii::app();
		// $app->language = 'fr_fr'; // yii uses all lowercase

		echo $app->dateFormatter->formatDateTime($time, 'short', null);
	}
}
