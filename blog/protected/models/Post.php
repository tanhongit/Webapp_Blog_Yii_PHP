<?php
class Post extends PostBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return '{{post}}';
	}
	
	// static function getProductByID($id){
	// 	$criteria  = new CDbCriteria();
	// 	$criteria->select = '*';
	// 	$criteria->limit = 12;
	// 	$data = Post::model()->find
	// }

	public function getRecent(){
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->order = 'create_time DESC';
		$criteria->limit = 6;
		$data = Post::model()->findAll($criteria);
		return $data;
	}

	public function getByID($id)
	{
		$data = Post::model()->findByPk($id);
		return $data;
	}
}