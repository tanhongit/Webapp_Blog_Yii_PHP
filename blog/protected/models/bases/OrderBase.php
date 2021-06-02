<?php

/**
 * This is the model class for table "{{order}}".
 *
 * The followings are the available columns in table '{{order}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $order_date
 * @property integer $status
 * @property double $total_price
 * @property string $first_name
 * @property string $last_name
 * @property string $country
 * @property string $company_name
 * @property string $address_street
 * @property string $address_optional
 * @property string $city
 * @property string $postcode
 * @property string $email
 * @property integer $phone
 * @property string $ship_first_name
 * @property string $ship_last_name
 * @property string $ship_country
 * @property string $ship_company_name
 * @property string $ship_address_street
 * @property string $ship_address_optional
 * @property string $ship_city
 * @property string $ship_postcode
 * @property string $ship_email
 * @property integer $ship_phone
 */
class OrderBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderBase the static model class
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
		return '{{order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, status, phone, ship_phone', 'numerical', 'integerOnly'=>true),
			array('total_price', 'numerical'),
			array('first_name, last_name, country, address_street, address_optional, city, postcode, email, ship_first_name, ship_last_name, ship_country, ship_address_street, ship_address_optional, ship_city, ship_postcode, ship_email', 'length', 'max'=>255),
			array('order_date, company_name, ship_company_name', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, order_date, status, total_price, first_name, last_name, country, company_name, address_street, address_optional, city, postcode, email, phone, ship_first_name, ship_last_name, ship_country, ship_company_name, ship_address_street, ship_address_optional, ship_city, ship_postcode, ship_email, ship_phone', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'order_date' => 'Order Date',
			'status' => 'Status',
			'total_price' => 'Total Price',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'country' => 'Country',
			'company_name' => 'Company Name',
			'address_street' => 'Address Street',
			'address_optional' => 'Address Optional',
			'city' => 'City',
			'postcode' => 'Postcode',
			'email' => 'Email',
			'phone' => 'Phone',
			'ship_first_name' => 'Ship First Name',
			'ship_last_name' => 'Ship Last Name',
			'ship_country' => 'Ship Country',
			'ship_company_name' => 'Ship Company Name',
			'ship_address_street' => 'Ship Address Street',
			'ship_address_optional' => 'Ship Address Optional',
			'ship_city' => 'Ship City',
			'ship_postcode' => 'Ship Postcode',
			'ship_email' => 'Ship Email',
			'ship_phone' => 'Ship Phone',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('order_date',$this->order_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('total_price',$this->total_price);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('address_street',$this->address_street,true);
		$criteria->compare('address_optional',$this->address_optional,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('ship_first_name',$this->ship_first_name,true);
		$criteria->compare('ship_last_name',$this->ship_last_name,true);
		$criteria->compare('ship_country',$this->ship_country,true);
		$criteria->compare('ship_company_name',$this->ship_company_name,true);
		$criteria->compare('ship_address_street',$this->ship_address_street,true);
		$criteria->compare('ship_address_optional',$this->ship_address_optional,true);
		$criteria->compare('ship_city',$this->ship_city,true);
		$criteria->compare('ship_postcode',$this->ship_postcode,true);
		$criteria->compare('ship_email',$this->ship_email,true);
		$criteria->compare('ship_phone',$this->ship_phone);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}