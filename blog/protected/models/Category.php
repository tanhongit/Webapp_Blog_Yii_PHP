<?php

class Category extends CategoryBase
{
	public function getAllCategory()
	{
		$data = Category::model()->findAll();
		return $data;
	}

	public function getCategoryByID($id)
	{
		$data = Category::model()->findByPk($id);
		return $data;
	}
}
