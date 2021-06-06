<?php

/**
 * This is the model class for table "{{order_detail}}".
 *
 * The followings are the available columns in table '{{order_detail}}':
 * @property integer $id
 * @property integer $order_id_id
 * @property integer $product_id
 * @property double $price
 * @property integer $quantity
 * @property string $create_time
 */
class OrderDetailBase extends CActiveRecord
{
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id_id, product_id, quantity', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id_id, product_id, price, quantity, create_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id_id' => 'Order Id',
			'product_id' => 'Product',
			'price' => 'Price',
			'quantity' => 'Quantity',
			'create_time' => 'Create Time',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('order_id_id',$this->order_id_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('price',$this->price);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}