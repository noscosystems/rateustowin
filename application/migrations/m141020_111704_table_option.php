<?php

class m141020_111704_table_option extends CDbMigration
{
	public function up()
	{
		$this->createTable(
            '{{option}}',
            array(
                'id'            => 'pk                                      COMMENT ""',
                'column'        => 'VARCHAR(64)    NOT NULL                 COMMENT ""',
                'name'          => 'VARCHAR(128)   NOT NULL                 COMMENT ""'
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
		echo "m141020_111704_table_option does not support migration down.\n";
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