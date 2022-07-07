<?php
class Order extends OrderBase
{
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderBase the static model class
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
		return '{{order}}';
	}

}