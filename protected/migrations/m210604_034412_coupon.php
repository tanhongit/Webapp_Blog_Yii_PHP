<?php

class m210604_034412_coupon extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{coupons}}', array(
			'id' => 'pk',
			'code' => 'varchar(255) not null',
			'discount' => 'float',
			'product_id' => 'int',
		));
	}

	public function down()
	{
		echo "m210604_034412_coupon does not support migration down.\n";
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