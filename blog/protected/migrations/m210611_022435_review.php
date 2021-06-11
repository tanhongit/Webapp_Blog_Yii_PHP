<?php

class m210611_022435_review extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{reviews}}', array(
			'id' => 'pk',
			'product_id' => 'int DEFAULT 0',
			'user_id' => 'int DEFAULT 0',
			'name' => 'varchar(255)',
			'email' => 'varchar(255)',
			'content' => 'LONGTEXT',
			'rating' => 'int',
		));
	}

	public function down()
	{
		echo "m210611_022435_review does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
