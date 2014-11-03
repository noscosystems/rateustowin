<?php

class m141103_075844_alter_table_answer extends CDbMigration
{
	public function up()
	{
		 $this->alterColumn("{{answer}}", 'answerTxt', 'VARCHAR(255) NOT NULL');
	}

	public function down()
	{
		echo "m141103_075844_alter_table_answer does not support migration down.\n";
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