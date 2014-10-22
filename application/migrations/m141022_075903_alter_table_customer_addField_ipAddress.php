<?php

class m141022_075903_alter_table_customer_addField_ipAddress extends CDbMigration
{
	public function up()
	{
		$this->addColumn("{{customer}}", 'ipAddress', 'VARCHAR(255) NOT NULL');
	}

	public function down()
	{
		echo "m141022_075903_alter_table_customer_addField_ipAddress does not support migration down.\n";
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