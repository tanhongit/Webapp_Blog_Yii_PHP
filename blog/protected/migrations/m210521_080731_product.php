<?php

class m210521_080731_product extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{product}}', array(
			'id' => 'pk',
			'name' =>'varchar(255) not null',
			'description' =>'longtext',
			'category_id' => 'int not null',
			'price' =>'float not null',
			'image' => 'varchar(255) not null',
			'image2' => 'varchar(255)',
			'image3' => 'varchar(255)',
			'image4' => 'varchar(255)',
			'status' => 'int',
			'meta_key' => 'longtext',
			'meta_description' => 'longtext',
			'create_time' => 'datetime',
			'update_time' => 'datetime',
			'author_id' => 'int',
		));
	}

	public function down()
	{
		echo "m210521_080731_product does not support migration down.\n";
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