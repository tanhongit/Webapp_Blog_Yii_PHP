<?php

class m210514_022656_comment extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{comment}}', array(
			'id' => 'pk',
			'content' =>'text not null',
			'status' => 'int not null',
			'create_time' => 'datetime',
			'author' => 'int not null',
			'email' => 'varchar(255) not null',
			'url' => 'varchar(255)',
			'post_id' => 'int not null',
		));
	}

	public function down()
	{
		return $this->dropTable('{{comment}}');
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