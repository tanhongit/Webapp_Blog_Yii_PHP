<?php

class m210512_095255_ngaytao_lookup extends CDbMigration
{
	public function up()
	{
		$this->addColumn('{{lookup}}','ngaytao', 'timestamp');
	}

	public function down()
	{
		echo "m210512_095255_ngaytao_lookup does not support migration down.\n";
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