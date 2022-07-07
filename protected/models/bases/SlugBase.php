
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
 */
class SlugBase extends CActiveRecord
{
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('slug', 'required'),
			array('product_id, post_id, category_id, tag_id', 'numerical', 'integerOnly' => true),
			array('slug', 'length', 'max' => 255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slug, product_id, post_id, category_id, tag_id', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'slug' => 'Slug',
			'product_id' => 'Product',
			'post_id' => 'Post',
			'category_id' => 'Category',
			'tag_id' => 'Tag',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('slug', $this->slug, true);
		$criteria->compare('product_id', $this->product_id);
		$criteria->compare('post_id', $this->post_id);
		$criteria->compare('category_id', $this->category_id);
		$criteria->compare('tag_id', $this->tag_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
