<?php

class m210521_082404_product_category_foreigin_key extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('FK_product_category', '{{product}}', 'category_id', '{{categories}}', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		echo "m210521_082404_product_category_foreigin_key does not support migration down.\n";
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