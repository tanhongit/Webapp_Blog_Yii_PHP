<?php

class m210603_010350_add_view_product extends CDbMigration
{
	public function up()
	{
		$this->addColumn('{{product}}', 'view', 'int AFTER status');
	}

	public function down()
	{
		echo "m210603_010350_add_view_product does not support migration down.\n";
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