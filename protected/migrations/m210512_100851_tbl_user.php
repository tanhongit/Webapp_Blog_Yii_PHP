<?php

class m210512_100851_tbl_user extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{user}}', array(
			'id' => 'int',
			'name' =>'varchar(255) not null',
			'fullname' => 'int not null',
		));
	}

	public function down()
	{
		echo "m210512_100851_tbl_user does not support migration down.\n";
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