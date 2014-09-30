<?php

class m140930_112458_table_user extends CDbMigration
{
	public function up()
	{
		$this->createTable(
            '{{user}}',
            array(
                'id'         	=> 'pk              COMMENT "The automatic, machine-readable identifier (integer) for an item  represented in this table."',
                'username'    	=> 'VARCHAR(64) 	NOT NULL',
                'password'	    => 'VARCHAR(64)    	NOT NULL',
                'firstname'		=> 'VARCHAR(64)     NOT NULL',
                'middlename'    => 'VARCHAR(64)     DEFAULT NULL',
                'lastname'   	=> 'VARCHAR(64) 	NOT NULL',
                'phoneNumber'   => 'INT(11) 		NOT NULL',
                'email'    		=> 'VARCHAR(255) 	NOT NULL',
                'priv'    		=> 'INT(11) 		NOT NULL',
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
		echo "m140930_112458_table_user does not support migration down.\n";
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