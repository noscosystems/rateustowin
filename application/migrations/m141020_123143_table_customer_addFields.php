<?php

class m141020_123143_table_customer_addFields extends CDbMigration
{
	public function up()
	{
		$this->addColumn("{{customer}}", 'sex', 'INT(11) NOT NULL');
		$this->addColumn("{{customer}}", 'ageGroup', 'INT(11) NOT NULL');
		$this->addColumn("{{customer}}", 'optIn', 'INT(11) NOT NULL');
	}

	public function down()
	{
		echo "m141020_123143_table_customer_addFields does not support migration down.\n";
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