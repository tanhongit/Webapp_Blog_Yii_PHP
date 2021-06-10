<?php

class m210610_082811_slugs extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{slugs}}', array(
			'id' => 'pk',
			'slug' => 'varchar(255) not null',
			'product_id' => 'int DEFAULT 0',
			'post_id' => 'int DEFAULT 0',
			'category_id' => 'int DEFAULT 0',
			'tag_id' => 'int DEFAULT 0',
		));
	}

	public function down()
	{
		echo "m210610_082811_slugs does not support migration down.\n";
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