<?php

use User as GlobalUser;

class User extends UserBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	public function getAllUser()
	{
		$data = User::model()->findAll();
		return $data;
	}

	public function getByEmail($email)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'email = "' . $email . '"';
		$data = User::model()->findAll($criteria);
		return $data;
	}
}
