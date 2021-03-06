<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $category_id
 * @property double $price
 * @property string $image
 * @property string $image2
 * @property string $image3
 * @property string $image4
 * @property integer $status
 * @property integer $view
 * @property string $meta_key
 * @property string $meta_description
 * @property string $create_time
 * @property string $update_time
 * @property integer $author_id
 *
 * The followings are the available model relations:
 * @property Categories $category
 */
class ProductBase extends CActiveRecord
{
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, category_id, price, image', 'required'),
			array('category_id, status, view, author_id', 'numerical', 'integerOnly' => true),
			array('price', 'numerical'),
			array('name, image, image2, image3, image4', 'length', 'max' => 255),
			array('description, meta_key, meta_description, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, category_id, price, image, image2, image3, image4, status, view, meta_key, meta_description, create_time, update_time, author_id', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'category_id' => 'Category',
			'price' => 'Price',
			'image' => 'Image',
			'image2' => 'Image2',
			'image3' => 'Image3',
			'image4' => 'Image4',
			'status' => 'Status',
			'view' => 'View',
			'meta_key' => 'Meta Key',
			'meta_description' => 'Meta Description',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'author_id' => 'Author',
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
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('category_id', $this->category_id);
		$criteria->compare('price', $this->price);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('image2', $this->image2, true);
		$criteria->compare('image3', $this->image3, true);
		$criteria->compare('image4', $this->image4, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('view', $this->view);
		$criteria->compare('meta_key', $this->meta_key, true);
		$criteria->compare('meta_description', $this->meta_description, true);
		$criteria->compare('create_time', $this->create_time, true);
		$criteria->compare('update_time', $this->update_time, true);
		$criteria->compare('author_id', $this->author_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
