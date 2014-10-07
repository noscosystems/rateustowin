<?php

    use \CException as Exception;
	use \application\components\form\Form;
	use \application\components\Controller;
	use \application\models\db\Organisation as OrganisationDB;
	use \application\models\db\Survey as SurveyDB;
	use \application\models\db\Question as QuestionDB;
	use \application\models\db\Branch;
	use \application\models\form\Organisation;
	use \application\models\form\Survey;

	class DefaultController extends Controller{

		public function actionIndex(){

			if (Yii::app()->user->isGuest)
				$this->redirect(array('/home'));
			else
				$form = new Form('application.forms.organisation', new Organisation);

			$frm = $form->model;

			if ($form->submitted() && $form->validate()){

				$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				var_dump( $url );
				exit;
				
				$organisation = new OrganisationDB;
				$organisation->attributes = $frm->attributes;
				$organisation->branchId = 1;
			}

			$this->render('index', array('form'=>$form));
		}
	}
