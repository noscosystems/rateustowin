<?php

class m141023_072523_alter_table_organisation_addField_terms extends CDbMigration
{
	public function up()
	{
		$this->addColumn("{{organisation}}", 'terms', 'TEXT NOT NULL');
	}

	public function down()
	{
		echo "m141023_072523_alter_table_organisation_addField_terms does not support migration down.\n";
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