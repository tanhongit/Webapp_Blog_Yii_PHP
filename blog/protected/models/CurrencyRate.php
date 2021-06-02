<?php
class CurrencyRate extends CurrencyRateBase
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CurrencyRateBase the static model class
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
        return '{{currency_rates}}';
    }

    public function getAllCurrency()
    {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->order = 'currency_code DESC';
        $data = CurrencyRate::model()->findAll($criteria);
        return $data;
    }
}
