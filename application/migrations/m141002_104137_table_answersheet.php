<?php

class m141002_104137_table_answersheet extends CDbMigration
{
	public function up()
	{
		$this->createTable(
            '{{answersheet}}',
            array(
                'id'         	=> 'pk              COMMENT "The automatic, machine-readable identifier (integer) for an item  represented in this table."',
                'customerId'	=> 'INT(11)    		NOT NULL',
                'branchId'    	=> 'INT(11) 		NOT NULL',
                'surveyId'	    => 'INT(11)     	NOT NULL',
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
		echo "m141002_104137_table_answersheet does not support migration down.\n";
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