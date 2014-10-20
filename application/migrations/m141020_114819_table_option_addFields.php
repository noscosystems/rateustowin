<?php

class m141020_114819_table_option_addFields extends CDbMigration
{
	public function up()
	{
		$this->insert('{{option}}', array(
            'id'  => '1',
            'column'     => 'sex',
            'name'  => 'Male'
        ));

        $this->insert('{{option}}', array(
            'id'  => '2',
            'column'     => 'sex',
            'name'  => 'Female'
        ));

        $this->insert('{{option}}', array(
            'id'  => '3',
            'column'     => 'sex',
            'name'  => 'Transgender'
        ));

        $this->insert('{{option}}', array(
            'id'  => '4',
            'column' => 'ageGroup',
            'name'  => 'under 12'
        ));

        $this->insert('{{option}}', array(
            'id'  => '5',
            'column' => 'ageGroup',
            'name'  => '13 to 17'
        ));

        $this->insert('{{option}}', array(
            'id'  => '6',
            'column' => 'ageGroup',
            'name'  => '18 to 25'
        ));

        $this->insert('{{option}}', array(
            'id'  => '7',
            'column' => 'ageGroup',
            'name'  => '26 to 34'
        ));

        $this->insert('{{option}}', array(
            'id'  => '8',
            'column' => 'ageGroup',
            'name'  => '35 to 49'
        ));

        $this->insert('{{option}}', array(
            'id'  => '9',
            'column' => 'ageGroup',
            'name'  => '50 to 64'
        ));

        $this->insert('{{option}}', array(
            'id'  => '10',
            'column' => 'ageGroup',
            'name'  => '65 or above'
        ));
	}

	public function down()
	{
		echo "m141020_114819_table_option_addFields does not support migration down.\n";
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