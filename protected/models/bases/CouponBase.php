<?php

/**
 * This is the model class for table "{{coupons}}".
 *
 * The followings are the available columns in table '{{coupons}}':
 * @property integer $id
 * @property string $code
 * @property double $discount
 * @property integer $product_id
 */
class CouponBase extends CActiveRecord
{
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code', 'required'),
			array('product_id', 'numerical', 'integerOnly' => true),
			array('discount', 'numerical'),
			array('code', 'length', 'max' => 255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, discount, product_id', 'safe', 'on' => 'search'),
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
			'code' => 'Code',
			'discount' => 'Discount',
			'product_id' => 'Product',
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
		$criteria->compare('code', $this->code, true);
		$criteria->compare('discount', $this->discount);
		$criteria->compare('product_id', $this->product_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
