<?php

class m210615_062604_payment extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{payments}}', array(
			'id' => 'pk',
			'order_id' => 'int NOT NULL',
			'payment_gross' => 'float NOT NULL',
			'currency_code' => 'varchar(10)',
			'payment_status' => 'varchar(20)',
		));
	}

	public function down()
	{
		echo "m210615_062604_payment does not support migration down.\n";
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