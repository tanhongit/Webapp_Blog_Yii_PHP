<?php

class Product extends ProductBase
{
	public function getAllProduct()
	{
		$data = Product::model()->findAll();
		return $data;
	}
}
