<?php

use User as GlobalUser;

class User extends UserBase
{
	public function getAllUser()
	{
		$data = User::model()->findAll();
		return $data;
	}
}
