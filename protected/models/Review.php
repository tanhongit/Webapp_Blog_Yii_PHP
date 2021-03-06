<?php

/**
 * This is the model class for table "{{slugs}}".
 *
 * The followings are the available columns in table '{{slugs}}':
 * @property integer $id
 * @property string $slug
 * @property integer $product_id
 * @property integer $post_id
 * @property integer $category_id
 * @property integer $tag_id
 *
 * The followings are the available model relations:
 * @property Categories $category
 * @property Post $post
 * @property Product $product
 * @property Tag $tag
 */
class Review extends ReviewBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ReviewBase the static model class
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
		return '{{reviews}}';
	}

	public function getAll()
	{
		$data = Review::model()->findAll();
		return $data;
	}

	public function getByProductID($product_id)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'product_id = ' . $product_id;
		$data = Review::model()->findAll($criteria);
		return $data;
	}
}
