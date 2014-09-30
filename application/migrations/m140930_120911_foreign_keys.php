<?php

class m140930_120911_foreign_keys extends CDbMigration
{
	
	public function up()
	{
		// $this->addForeignKey('name_of_key', '{{table_from}}', 'column_from', '{{table_to}}', 'column_to');
		$this->addForeignKey('fk_organasation_branchId_branch_id', '{{organasation}}', 'branchId', '{{branch}}', 'id');
		$this->addForeignKey('fk_organasation_logoImg_Image_id', '{{organasation}}', 'logoImg', '{{Image}}', 'id');
		$this->addForeignKey('fk_survey_organasationId_organasation', '{{survey}}', 'organasationId', '{{organasation}}', 'id');
		$this->addForeignKey('fk_question_surveyId_survey_id', '{{question}}', 'surveyId', '{{survey}}', 'id');
		$this->addForeignKey('fk_question_answerType_answertype_id', '{{question}}', 'answerType', '{{answertype}}', 'id');
		$this->addForeignKey('fk_answer_userId_user_id', '{{answer}}', 'userId', '{{user}}', 'id');
		$this->addForeignKey('fk_answer_branchId_branch_id', '{{answer}}', 'branchId', '{{branch}}', 'id');
		$this->addForeignKey('fk_answer_answerType_answertype_id', '{{answer}}', 'answerType', '{{answertype}}', 'id');

	}

	public function down()
	{
		echo "m140930_120911_foreign_keys does not support migration down.\n";
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