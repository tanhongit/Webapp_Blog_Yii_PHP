<?php

class m210512_094057_tbl_lookup extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{lookup}}', array(
			'id' => 'int',
			'name' =>'varchar(255) not null',
			'code' => 'int not null',
			'type' =>'varchar(255) not null',
			'position' => 'int not null',
		));
	}

	public function down()
	{
		// echo "m210512_094057_tbl_lookup does not support migration down.\n";
		// return false;
		return $this->dropTable('{{lookup}}');
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
