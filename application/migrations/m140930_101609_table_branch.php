<?php

class m140930_101609_table_branch extends CDbMigration
{
	public function up()
	{
		$this->createTable(
            '{{branch}}',
            array(
                'id'         	=> 'pk                   COMMENT "The automatic, machine-readable identifier (integer) for an item  represented in this table."',
                'name'    		=> 'VARCHAR(255) NOT NULL COMMENT "Users Username, used for logging in and alias identification"',
                'address1'     	=> 'VARCHAR(128)    NOT NULL COMMENT "Password required to log in to the system"',
                'county'		=> 'VARCHAR(64)             NULL',
                'phoneNumber'   => 'VARCHAR(11) NOT NULL',
                'town'    		=> 'VARCHAR(64)     NULL',
                'postcode'      => 'VARCHAR(20) NOT NULL',
                'email'      	=> 'VARCHAR(255)         NOT NULL COMMENT "Level used to determine permissions and privileges"',
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
		echo "m140930_101609_table_branch does not support migration down.\n";
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