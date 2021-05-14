<?php

class m210514_022239_post extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{post}}', array(
			'id' => 'pk',
			'title' =>'varchar(255) not null',
			'content' => 'text not null',
			'tag' =>'varchar(255) not null',
			'status' => 'int not null',
			'create_time' => 'int',
			'update_time' => 'int',
			'author_id' => 'int not null',
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