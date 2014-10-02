<?php

class m141002_104316_table_answer extends CDbMigration
{
	public function up()
	{
		$this->createTable(
            '{{answer}}',
            array(
                'id'         	=> 'pk              	COMMENT "The automatic, machine-readable identifier (integer) for an item  represented in this table."',
                'questId'		=> 'INT(11)	NOT NULL	COMMENT "Question id"	',
                'ansSheetId'    => 'INT(11)	NOT NULL 	COMMENT "Answersheet id"',
                'answerTxt'	    => 'INT(11)	NOT NULL    COMMENT "The question\'s answer."',
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
		echo "m141002_104316_table_answer does not support migration down.\n";
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