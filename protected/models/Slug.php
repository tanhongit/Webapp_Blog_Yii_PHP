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
class Slug extends SlugBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Slug the static model class
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
		return '{{slugs}}';
	}

	public function getAll()
	{
		$data = Slug::model()->findAll();
		return $data;
	}

	public function getBySlug($slug)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'slug = "' . $slug . '"';
		$data = Slug::model()->findAll($criteria);
		return $data;
	}

	public function getByPostID($post_id)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'post_id = ' . $post_id;
		$data = Slug::model()->findAll($criteria);
		return $data;
	}

	public function getByOptionID($option, $id)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = $option . ' = ' . $id;
		$data = Slug::model()->findAll($criteria);
		return $data;
	}
}