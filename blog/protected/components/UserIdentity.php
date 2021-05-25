<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	// public function authenticate()
	// {
	// 	$users=array(
	// 		// username => password
	// 		'demo'=>'demo',
	// 		'admin'=>'admin',
	// 	);
	// 	if(!isset($users[$this->username]))
	// 		$this->errorCode=self::ERROR_USERNAME_INVALID;
	// 	elseif($users[$this->username]!==$this->password)
	// 		$this->errorCode=self::ERROR_PASSWORD_INVALID;
	// 	else
	// 		$this->errorCode=self::ERROR_NONE;
	// 	return !$this->errorCode;
	// }

	private $id;
	public function authenticate()
	{
		$username = strtolower($this->username);
		$user = User::model()->find('LOWER(username)=?', array($username));
		// print_r('<pre>');
		// print_r($user->password);die;
		if ($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if (!isset($user->password) || $user->password !== $this->password)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->id = $user->id;
			$this->username = $user->username;
			$this->errorCode = self::ERROR_NONE;
			Yii::app()->user->setState('currentUserInfo', $user);
		}
		return $this->errorCode == self::ERROR_NONE;
	}
	public function getId()
	{
		return $this->id;
	}
}
