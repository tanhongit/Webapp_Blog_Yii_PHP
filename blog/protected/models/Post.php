<?php
class Post extends PostBase
{
	// static function getProductByID($id){
	// 	$criteria  = new CDbCriteria();
	// 	$criteria->select = '*';
	// 	$criteria->limit = 12;
	// 	$data = Post::model()->find
	// }

	public function getRecentPost(){
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->order = 'create_time DESC';
		$criteria->limit = 6;
		$data = Post::model()->findAll($criteria);
		return $data;
	}
}