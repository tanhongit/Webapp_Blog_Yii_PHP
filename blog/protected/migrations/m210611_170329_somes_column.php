<?php

class m210611_170329_somes_column extends CDbMigration
{
	public function up()
	{
		$this->addColumn('{{reviews}}', 'create_time', 'datetime AFTER rating');
	}

	public function down()
	{
		echo "m210611_170329_somes_column does not support migration down.\n";
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