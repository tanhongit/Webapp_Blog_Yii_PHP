<?php

/**
 * This is the model class for table "{{currency_rates}}".
 *
 * The followings are the available columns in table '{{currency_rates}}':
 * @property integer $id
 * @property string $currency_name
 * @property string $currency_code
 * @property double $rate
 */
class CurrencyRateBase extends CActiveRecord
{
	

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('currency_code, rate', 'required'),
			array('rate', 'numerical'),
			array('currency_name, currency_code', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, currency_name, currency_code, rate', 'safe', 'on'=>'search'),
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
			'currency_name' => 'Currency Name',
			'currency_code' => 'Currency Code',
			'rate' => 'Rate',
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
		$criteria->compare('currency_name',$this->currency_name,true);
		$criteria->compare('currency_code',$this->currency_code,true);
		$criteria->compare('rate',$this->rate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}