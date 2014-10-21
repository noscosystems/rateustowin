<?php
	use \application\models\db\Survey;

	// echo $_REQUEST['send'];

	$rawSurvey = Survey::model()->findAllByAttributes(array('orgId' => $_REQUEST['send']));
	$survey = [];

	foreach ($rawSurvey as $currSurv)
		$survey[] =	array(
			array(3 => $currSurv->name, 4=> array('active'=>$currSurv->active, 'id' => $currSurv->id)));

	$surveyJSON = json_encode($survey);
		echo $surveyJSON;

