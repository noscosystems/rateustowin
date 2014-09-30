<?php

class m140930_102314_table_image extends CDbMigration
{
	public function up()
	{
		$this->createTable(
            '{{image}}',
            array(
                'id'         	=> 'pk                   COMMENT "The automatic, machine-readable identifier (integer) for an item  represented in this table."',
                'url'    		=> 'VARCHAR(255) NOT NULL COMMENT "Users Username, used for logging in and alias identification"',
                'desc'     		=> 'VARCHAR(255) NOT NULL COMMENT "Password required to log in to the system"',
            ),
            implode(' ', array(
                'ENGINE          = InnoDB',
                'DEFAULT CHARSET = utf8',
                'COLLATE         = utf8_general_ci',
                'COMMENT         = ""',
                'AUTO_INCREMENT  = 1',
            ))
        );
	}

	public function down()
	{
		echo "m140930_102314_table_image does not support migration down.\n";
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