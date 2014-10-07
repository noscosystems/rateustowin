<?php

class m141002_114141_table_foreign_keys extends CDbMigration
{
	public function up()
	{
		// $this->addForeignKey('name_of_key', '{{table_from}}', 'column_from', '{{table_to}}', 'column_to');
		//$this->addForeignKey('fk_branches_organisationId_organisation_id', '{{branches}}', 'organisationId', '{{organisation}}', 'id');
		$this->addForeignKey('fk_organasation_logoImg_Image_id', '{{organisation}}', 'logoImg', '{{image}}', 'id');
		$this->addForeignKey('fk_organasation_prizeImg_Image_id', '{{organisation}}', 'prizeImg', '{{image}}', 'id');
		$this->addForeignKey('fk_survey_orgId_organisation', '{{survey}}', 'orgId', '{{organisation}}', 'id');
		$this->addForeignKey('fk_question_surveyId_survey_id', '{{question}}', 'surveyId', '{{survey}}', 'id');
		$this->addForeignKey('fk_question_answerType_answertype_id', '{{question}}', 'answerType', '{{answertype}}', 'id');
		$this->addForeignKey('fk_answersheet_customerId_customer_id', '{{answersheet}}', 'customerId', '{{customer}}', 'id');
		$this->addForeignKey('fk_answersheet_branchId_branches_id', '{{answersheet}}', 'branchId', '{{branches}}', 'id');
		$this->addForeignKey('fk_answersheet_surveyId_survey_id', '{{answersheet}}', 'surveyId', '{{survey}}', 'id');
		$this->addForeignKey('fk_answer_ansSheetId_answerheet_id', '{{answer}}', 'ansSheetId', '{{answersheet}}', 'id');
		$this->addForeignKey('fk_answer_questId_question_id', '{{answer}}', 'questId', '{{question}}', 'id');

	}

	public function down()
	{
		echo "m141002_114141_table_foreign_keys does not support migration down.\n";
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