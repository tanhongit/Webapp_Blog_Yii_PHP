<?php

class m210610_084933_slug_post_foreigin_keys extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('FK_slug_post', '{{slugs}}', 'post_id', '{{post}}', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		echo "m210610_084933_slug_post_foreigin_keys does not support migration down.\n";
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