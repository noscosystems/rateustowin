<?php

class m140930_112217_table_answer_type extends CDbMigration
{
	public function up()
	{
		$this->createTable(
            '{{answertype}}',
            array(
                'id'      => 'pk              COMMENT "The automatic, machine-readable identifier (integer) for an item  represented in this table."',
                'type'    => 'VARCHAR(255) 		NOT NULL',
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
		echo "m140930_112217_table_answer_type does not support migration down.\n";
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