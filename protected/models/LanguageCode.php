<?php
class LanguageCode extends LanguageCodeBase
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return LanguageCodeBase the static model class
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
        return '{{language_codes}}';
    }

    public function getAll()
    {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->order = 'name DESC';
        $data = LanguageCode::model()->findAll($criteria);
        return $data;
    }

    public function getByCode($code)
    {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->condition = 'first_code = "' . $code . '"';
        $data = LanguageCode::model()->findAll($criteria);
        return $data;
    }
}
