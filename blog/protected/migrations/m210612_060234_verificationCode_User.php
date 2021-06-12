<?php

class m210612_060234_verificationCode_User extends CDbMigration
{
	public function up()
	{
		$this->addColumn('{{user}}', 'verificationCode', 'varchar(255) AFTER email');
	}

	public function down()
	{
		echo "m210612_060234_verificationCode_User does not support migration down.\n";
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