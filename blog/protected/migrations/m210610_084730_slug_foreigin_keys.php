<?php

class m210610_084730_slug_foreigin_keys extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('FK_slug_category', '{{slugs}}', 'category_id', '{{categories}}', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('FK_slug_product', '{{slugs}}', 'product_id', '{{product}}', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('FK_slug_tag', '{{slugs}}', 'tag_id', '{{tag}}', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		echo "m210610_084730_slug_foreigin_keys does not support migration down.\n";
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