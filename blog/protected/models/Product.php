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

	public function getTotalProductRecord()
	{
		$data = Product::model()->count();
		return $data;
	}

	public function getTotalProductRecordByCategory($category_id)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'category_id = ' . $category_id;
		$data = Product::model()->count($criteria);
		return $data;
	}

	public function getProductByCategoryUsePagi($category_id, $page = 0, $per_page = 0)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'category_id = ' . $category_id;
		$criteria->offset = ($page * $per_page);
		$criteria->limit = $per_page;
		$data = Product::model()->findAll($criteria);
		return $data;
	}
}
