<?php

class Category extends CategoryBase
{
	public function getAllCategory()
	{
		$data = Category::model()->findAll();
		return $data;
	}
}
