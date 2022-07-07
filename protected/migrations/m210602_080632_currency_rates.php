<?php

class m210602_080632_currency_rates extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{currency_rates}}', array(
			'id' => 'pk',
			'currency_name' => 'varchar(255)',
			'currency_code' => 'varchar(255) not null',
			'rate' => 'float not null',
		));
	}

	public function down()
	{
		echo "m210602_080632_currency_rates does not support migration down.\n";
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
