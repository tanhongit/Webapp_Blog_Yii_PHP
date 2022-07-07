<?php

class m210521_082103_category extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{categories}}', array(
			'id' => 'pk',
			'name' =>'varchar(255) not null',
			'description' =>'longtext',
			'status' => 'int',
			'meta_key' => 'longtext',
			'meta_description' => 'longtext',
			'create_time' => 'datetime',
			'update_time' => 'datetime',
		));
	}

	public function down()
	{
		echo "m210521_082103_category does not support migration down.\n";
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