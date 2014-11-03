<?php

class m141103_100621_alter_table_answersheet extends CDbMigration
{
	public function up()
	{
		$this->addColumn('{{answersheet}}','created','INT(11) NOT NULL');
	}

	public function down()
	{
		echo "m141103_100621_alter_table_answersheet does not support migration down.\n";
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