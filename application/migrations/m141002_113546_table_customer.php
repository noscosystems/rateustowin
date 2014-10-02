<?php

class m141002_113546_table_customer extends CDbMigration
{
	public function up()
        {
            $this->createTable(
                '{{customer}}',
                array(
                    // Entities.
                    'id'            => 'pk                                          COMMENT "The automatic, machine-readable identifier (integer) for a staff member represented in this table."',
                    'firstname'     => 'VARCHAR(128)    NOT NULL                    COMMENT "The customer\'s first name, used for reporting data about user."',
                    'middlename'    => 'VARCHAR(128)                                COMMENT "The customer\'s preferred name, used for addressing the user."',
                    'lastname'      => 'VARCHAR(128)    NOT NULL                    COMMENT "The customer\'s last name, used for reporting data about users."',
                    'email'         => 'VARCHAR(255)    NOT NULL    UNIQUE          COMMENT "The email address of the customer used to ptentially connect with him."',
                    'phoneNum'		=> 'VARCHAR(255)	NOT NULL 					COMMENT "The phone number of the customer used to ptentially connect with him."',
                    'created'       => 'INT             NOT NULL                    COMMENT "The timestamp of when the users account was created."',
                ),
                implode(' ', array(
                    'ENGINE          = InnoDB',
                    'DEFAULT CHARSET = utf8',
                    'COLLATE         = utf8_general_ci',
                    'COMMENT         = "The user definitions and credentials of the staff members using this system."',
                    'AUTO_INCREMENT  = 1',
                ))
            );
        }

	public function down()
	{
		echo "m141002_113546_table_customer does not support migration down.\n";
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