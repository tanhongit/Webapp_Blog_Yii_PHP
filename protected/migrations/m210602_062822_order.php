<?php

class m210602_062822_order extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{order}}', array(
			'id' => 'pk',
			'user_id' =>'int',
			'order_date' =>'date',
			'status' => 'int',
			'total_price' =>'float',
			'first_name' => 'varchar(255)',
			'last_name' => 'varchar(255)',
			'country' => 'varchar(255)',
			'company_name' => 'longtext',
			'address_street' => 'varchar(255)',
			'address_optional' => 'varchar(255)',
			'city' => 'varchar(255)',
			'postcode' => 'varchar(255)',
			'email' => 'varchar(255)',
			'phone' => 'int',

			'ship_first_name' => 'varchar(255)',
			'ship_last_name' => 'varchar(255)',
			'ship_country' => 'varchar(255)',
			'ship_company_name' => 'longtext',
			'ship_address_street' => 'varchar(255)',
			'ship_address_optional' => 'varchar(255)',
			'ship_city' => 'varchar(255)',
			'ship_postcode' => 'varchar(255)',
			'order_comments' => 'varchar(500)',
			'ship_phone' => 'int',
		));
	}

	public function down()
	{
		echo "m210602_062822_order does not support migration down.\n";
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