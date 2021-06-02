<?php

class Product extends ProductBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product}}';
	}

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
		$criteria->order = 'create_time DESC';
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

	public function getAllProductUsePagination($page = 0, $per_page = 0)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->limit  = $per_page;
		$criteria->offset = ($page * $per_page);
		$criteria->order = 'create_time DESC';
		$data = Product::model()->findAll($criteria);
		return $data;
	}

	public function getProductByCategoryUsePagi($category_id, $page = 0, $per_page = 0)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'category_id = ' . $category_id;
		$criteria->offset = ($page * $per_page);
		$criteria->limit = $per_page;
		$criteria->order = 'create_time DESC';
		$data = Product::model()->findAll($criteria);
		return $data;
	}

	public function testUsingQueryCaching()
	{
		$sql = 'SELECT * FROM tbl_product LIMIT 2';
		$rows = Yii::app()->db->createCommand($sql)->queryAll();
		Yii::app()->cache->set('testquery', $rows, 10);
	}

	public function productQueryCaching()
	{
		$val = Yii::app()->cache->get('testquery');
		if (!$val) {
			sleep(3);
			set_time_limit(30);
			$sql = 'SELECT * FROM tbl_product LIMIT 5';
			$rows = Yii::app()->db->createCommand($sql)->queryAll();
			Yii::app()->cache->set('testquery', $rows, 20);
		}
	}

	public function getDetailProduct($id)
	{
		$data = Product::model()->findByPk($id);
		return $data;
	}

	public function getRecentProduct()
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->order = 'create_time DESC';
		$criteria->limit = 5;
		$data = Product::model()->findAll($criteria);
		return $data;
	}

	public function getLatestProduct()
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->order = 'create_time DESC';
		$criteria->limit = 20;
		$data = Product::model()->findAll($criteria);
		return $data;
	}
}
