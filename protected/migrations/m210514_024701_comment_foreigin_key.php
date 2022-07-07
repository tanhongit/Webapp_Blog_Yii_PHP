<?php

class m210514_024701_comment_foreigin_key extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('FK_comment_post', '{{comment}}', 'post_id', '{{post}}', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		echo "m210514_024701_comment_foreigin_key does not support migration down.\n";
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