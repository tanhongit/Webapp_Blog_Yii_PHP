<?php
require_once('protected/scripts/globals.php');
/**
 * ApplicationConfigBehavior is a behavior for the application.
 * It loads additional config paramenters that cannot be statically 
 * written in config/main
 */
class ApplicationConfigBehavior extends CBehavior
{
	/**
	 * Declares events and the event handler methods
	 * See yii documentation on behaviour
	 */
	public function events()
	{
		return array_merge(parent::events(), array(
			'onBeginRequest' => 'beginRequest',
		));
	}

	/**
	 * Load configuration that cannot be put in config/main
	 */
	public function beginRequest()
	{
		$test_main_url = explode('.', $_SERVER['HTTP_HOST']);
		$pop_array_url = array_pop($test_main_url);

		$test_request_url = explode('/', $_SERVER['REQUEST_URI']);

		if (in_array($pop_array_url, language_codes())) {
			Yii::app()->user->setState('applicationLanguage', $pop_array_url);
		} elseif (in_array($test_request_url[1], language_codes())) {
			Yii::app()->user->setState('applicationLanguage', $test_request_url[1]);
		} elseif (isset($_POST['language'])) {
			Yii::app()->user->setState('applicationLanguage', $_POST['language']);
		}

		if (isset($_POST['currency_code'])) {
			Yii::app()->user->setState('applicationCurrency', $_POST['currency_code']);
		}
		/*If you don't allow guest users to customize the language while visiting in the subdomain, remove the comment state here and edit the function actionsettings() in SiteController.php */
		// $test_main_url = explode('.', $_SERVER['HTTP_HOST']);
		// !empty($test_main_url[2]) && Yii::app()->user->setState('applicationLanguage', $test_main_url[2]);

		$this->owner->user->getState('applicationLanguage') ?
			$this->owner->language = $this->owner->user->getState('applicationLanguage')
			: $this->owner->language = 'en';

		$this->owner->user->getState('applicationCurrency') ?
			Yii::app()->params->currency = $this->owner->user->getState('applicationCurrency')
			: Yii::app()->params->currency = 'USD';
	}
}
