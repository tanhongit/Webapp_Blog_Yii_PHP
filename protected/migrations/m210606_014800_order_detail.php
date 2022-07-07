<?php

class m210606_014800_order_detail extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{order_detail}}', array(
			'id' => 'pk',
			'order_id_id' => 'int',
			'product_id' => 'int',
			'price' => 'float',
			'quantity' => 'int',
			'create_time' => 'datetime',
		));
	}

	public function down()
	{
		echo "m210606_014800_order_detail does not support migration down.\n";
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
