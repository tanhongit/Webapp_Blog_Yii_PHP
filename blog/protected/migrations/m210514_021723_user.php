<?php

class m210514_021723_user extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{user}}', array(
			'id' => 'pk',
			'username' =>'varchar(255) not null',
			'password' => 'varchar(255) not null',
			'email' =>'varchar(255) not null',
			'profile' => 'text',
		));
	}

	public function down()
	{
		return $this->dropTable('{{post}}');
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