<?php

class m140930_103856_table_question extends CDbMigration
{
	public function up()
	{
		$this->createTable(
            '{{question}}',
            array(
                'id'         	=> 'pk             	COMMENT "The automatic, machine-readable identifier (integer) for an item  represented in this table."',
                'surveyId'    	=> 'INT(11)			NOT NULL',
                'questTxt'		=> 'VARCHAR(128)    NOT NULL COMMENT "The actual question."',
                'answerType'	=> 'INT(11)         NOT NULL COMMENT "The answer type"',
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
		echo "m140930_103856_table_question does not support migration down.\n";
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