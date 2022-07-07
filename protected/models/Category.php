<?php

class Category extends CategoryBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return '{{categories}}';
	}

	public function getAll()
	{
		$data = Category::model()->findAll();
		return $data;
	}

	public function getByID($id)
	{
		$data = Category::model()->findByPk($id);
		return $data;
	}

	public function getForWidget()
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->order = 'id DESC';
		$criteria->limit = 5;
		$data = Category::model()->findAll($criteria);
		return $data;
	}
}
