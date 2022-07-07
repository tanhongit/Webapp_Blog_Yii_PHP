<?php

class m210514_023450_tag extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{tag}}', array(
			'id' => 'pk',
			'name' =>'varchar(255) null',
			'frequency' => 'int not null',
		));
	}

	public function down()
	{
		return $this->dropTable('{{tag}}');
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