<?php

class m140930_110213_table_answer extends CDbMigration
{
	public function up()
	{
		$this->createTable(
            '{{answer}}',
            array(
                'id'         	=> 'pk              COMMENT "The automatic, machine-readable identifier (integer) for an item  represented in this table."',
                'branchId'    	=> 'INT(11) 		NOT NULL',
                'userId'	    => 'INT(11)    		NOT NULL',
                'branchId'		=> 'INT(11)         NOT NULL',
                'questionId'    => 'INT(11)     		NOT NULL',
                'answer'   		=> 'VARCHAR(255) 	DEFAULT NULL',
                'answerType'    => 'INT(11) 		NOT NULL',
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
		echo "m140930_110213_table_answer does not support migration down.\n";
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