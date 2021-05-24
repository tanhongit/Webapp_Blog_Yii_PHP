<?php

class Product extends ProductBase
{
	public function getAllProduct()
	{
		$data = Product::model()->findAll();
		return $data;
	}

	public function getProductHomePage()
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->limit  = 12;
		$data = Product::model()->findAll($criteria);
		return $data;
	}

	public function getProductByCategory($category_id)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'category_id = ' . $category_id;
		$data = Product::model()->findAll($criteria);
		return $data;
	}
}
