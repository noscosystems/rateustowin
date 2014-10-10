<?php

class m141010_073854_answerTypes extends CDbMigration
{
	public function up()
        {
            $this->insert('{{answertype}}', array(
                'id'   => 1,
				'type' => 'freetext',
            ));
            $this->insert('{{answertype}}', array(
                'id'   => 2,
				'type' => 'emoticon',
            ));
        }

	public function down()
	{
		echo "m141010_073854_answerTypes does not support migration down.\n";
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