<?php

class m210602_134037_language_codes extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{language_codes}}', array(
			'id' => 'pk',
			'name' => 'varchar(255) not null',
			'first_code' => 'varchar(255) not null',
			'second_code' => 'varchar(255) not null',
		));
	}

	public function down()
	{
		echo "m210602_134037_language_codes does not support migration down.\n";
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