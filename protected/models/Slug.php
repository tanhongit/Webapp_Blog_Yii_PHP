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

    /**
     * @param $slug
     * @return array|CActiveRecord|mixed|null
     */
	public function getBySlug($slug)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'slug = "' . $slug . '"';
		$data = Slug::model()->findAll($criteria);
		return $data;
	}

    /**
     * @param $post_id
     * @return array|CActiveRecord|mixed|null
     */
	public function getByPostID($post_id)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'post_id = ' . $post_id;
		$data = Slug::model()->findAll($criteria);
		return $data;
	}

    /**
     * @param $option
     * @param $id
     * @return array|CActiveRecord|mixed|null
     */
	public function getByOptionID($option, $id)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = $option . ' = ' . $id;
		$data = Slug::model()->findAll($criteria);
		return $data;
	}

    /**
     * @param $conditions
     * @param $select
     * @return array|CActiveRecord|mixed|null
     */
    public function getByOptionCondition($conditions = '', $select = '*')
    {
        $criteria = new CDbCriteria();
        $criteria->select = $select;
        if ($conditions != '') {
            $criteria->condition = $conditions;
        }
        $data = Slug::model()->findAll($criteria);
        return $data;
    }

    /**
     * @param $objectID
     * @param $data
     * @param $action
     * @return mixed
     */
    public function updateSlug($objectID, $data, $action = 'update') {
        $slugModel = self::model()->getByPostID($objectID)[0];
        if ($data) {
            $slugModel->attributes = $_POST['Slug'];

            $slugName = slug($_POST['Slug']['slug']);
            if (empty($slugName)) {
                $slugName = slug($_POST['Post']['title']);
            }
            $slugTerm = $slugName;

            if ('update' == $action) {
                $condition = 'slug = "' . $slugName . '" AND id != ' . $slugModel->id;
                $checkSlug = self::model()->getByOptionCondition($condition);
                if (count($checkSlug) > 0) {
                    $slugTerm = slug($slugName . '-' . generateRandomString());
                }
            }
            $slugModel->slug = $slugTerm;

            $slugModel->save();
        }
        return $slugModel;
    }

    /**
     * @param $data
     * @param $model
     * @param $object
     * @return false|Slug
     */
    public function createSlug($data, $model, $object = 'product')
    {
        if ($data) {
            $slugModel = new Slug;
            $slugModel->attributes = $data['Slug'];

            $objectID = $object . '_id';
            $slugModel->$objectID = $model->id;
            if (empty($data['Slug']['slug'])) {
                $slugModel->slug = slug($model->title);
            } else {
                $slugModel->slug = slug($data['Slug']['slug']);
            }

            $slugTerm = $slugModel->slug;
            $condition = 'slug = "' . $slugModel->slug . '"';
            $checkSlug = self::model()->getByOptionCondition($condition);
            if (count($checkSlug) > 0) {
                $slugTerm = slug($slugModel->slug . '-' . generateRandomString());
            }
            $slugModel->slug = $slugTerm;

            $slugModel->save();
            return $slugModel;
        }
        return false;
    }
}
