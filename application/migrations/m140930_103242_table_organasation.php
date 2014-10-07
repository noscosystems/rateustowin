<?php

class m140930_103242_table_organasation extends CDbMigration
{
	public function up()
	{
		$this->createTable(
            '{{organisation}}',
            array(
                'id'         	=> 'pk              COMMENT "The automatic, machine-readable identifier (integer) for an item  represented in this table."',
                'name'	     	=> 'VARCHAR(128)    NOT NULL',
                'address'		=> 'TEXT            NOT NULL',
                'email'    		=> 'VARCHAR(255)    NOT NULL',
                'phoneNumber'   => 'VARCHAR(11) 	NOT NULL',
                'logoImg'      	=> 'INT(11) 		NOT NULL',
                'prizeImg'      => 'INT(11) 		NOT NULL'
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
		echo "m140930_103242_table_organasation does not support migration down.\n";
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