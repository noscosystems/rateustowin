<?php

    use \CException as Exception;
	use \application\components\form\Form;
	use \application\components\Controller;
	use \application\models\db\Organisation as OrganisationDB;
	use \application\models\db\Survey as SurveyDB;
	use \application\models\db\Question as QuestionDB;
	use \application\models\db\Image;
	use \application\models\db\Branch as BranchDB;
	use \application\models\form\Organisation;
	use \application\models\form\Survey;
	use \application\models\form\Branch;

	class DefaultController extends Controller{

        /**
         * Filters
         *
         * @access public
         * @return array
         */
		public function filters()
		{
			return array(
				'accessControl',
			);
		}

        /**
         * Access Rules
         *
         * @access public
         * @return array
         */
		public function accessRules()
		{
			return array(
			    array('allow',
                    'priv' => 1,
                ),
                array('deny'),
            );
		}

        // HI PAV!
        // The two methods above control who can access this controller. Basically you say that anyone who has a
        // privilege above 1 are allowed. Everybody else are denied.
        // This will automatically redirect anybody who isn't logged-in to the login page.
        // You don't have to use it, but thought you might be interested in it :)

		public function actionIndex(){

			$form = new Form('application.forms.organisation', new Organisation);
			$formBranch = new Form('application.forms.branch', new Branch);
			$formSurvey = new Form('application.forms.survey', new Survey);

			$frm = $form->model;

			if ($form->submitted() && $form->validate()){

				$organisationExists = OrganisationDb::model()->findAllByAttributes(array('name' => $frm->name));

                if($organisationExists)
                    $frm->addError('organisation', 'An organisation with this name already exists.');
                else{
				$files = [];
				$organisation = new OrganisationDB;
				$organisation->attributes = $frm->attributes;

				foreach($_FILES['image'] as $key1 => $value1){
			        foreach($value1 as $key2 => $value2)
			            $files[$key2][$key1] = $value2;
			    }

				foreach ($files as $i => $file){
			    	if ($file['size']>0 && $file['error'] == 0){
			    		$imgType = exif_imagetype ($file['tmp_name']);
			    		if ( $imgType == 2 || $imgType == 3 ){
			    			$img = new Image;

			    			$img->url = Yii::getPathOfAlias('application.views.Uploads.images').'/'.$file['name'];
			    			$img->desc = $_POST['desc'][$i];

			    			if (empty($form->errors) && empty($img->errors) && move_uploaded_file($file['tmp_name'], $img->url)){
			    				$img->save();
			    				if ($i==0)
			    					$organisation->prizeImg=$img->id;
			    				else if ($i==1)
			    					$organisation->logoImg=$img->id;
			    			}else
			    				Yii::app()->user->setFlash('images','Something went wrong saving images.');
			    		}
			    		else
			    			$frm->addError('imgType','Upload a jpeg or png image pls.');
					}
			    }


				if (empty($form->errors) && empty($organisation->errors)){
					if ($organisation->save())
						Yii::app()->user->setFlash('addSuccess','Added an organisation successfully.');
				}
			}
			}

			if ($formBranch->submitted() && $formBranch->validate()){
				$branch = new BranchDB;
				$branch->attributes = $formBranch->model->attributes;
				if ($branch->save())
					Yii::app()->user->setFlash('addBranchSucc','Added new branch successfully.');
			}

			if ($formSurvey->submitted() && $formSurvey->validate()){

				$survey = new SurveyDB;
				$survey->attributes = $formSurvey->model->attributes;
				$survey->active = 0;
				$survey->save();
				$questionsCount = count($_POST['question']);

				for ($i=0; $i<$questionsCount; $i++){
					if ($_POST['question'][$i]!='' && $_POST['answerType'][$i]!='' && $_POST['answerType'][$i]!='Please select' ){
						$question = new QuestionDB;
						$question->questTxt = $_POST['question'][$i];
						$question->surveyId = $survey->id;
						$question->answerType = $_POST['answerType'][$i];
						if ($question->validate())
							$question->save();
					}
				}
			}

			$organisation = \application\models\db\Organisation::model()->findAll();

			if (isset($_POST['submit'])){
				if ($_POST['submit'] == 'LiveSurvey'){

					$surveys = SurveyDB::model()->findAllByAttributes(array('orgId' => $_POST['myOrganisation']));

					$checkbox = (isset($_POST['checkboxes']))?($_POST['checkboxes']):('');
					foreach ($surveys as $index => $currSurv){
						$currSurv->active = 0;
						$currSurv->save();
					}

					$activeSurvey = SurveyDB::model()->findByPk($checkbox);
					$activeSurvey->active = 1;
					if ($activeSurvey->save())
						Yii::app()->user->setFlash('ChangeSuccess','Active survey updated.');
				}
			}

			$this->render('index', array(
									'form'=>$form,
									'formBranch' => $formBranch,
									'formSurvey' => $formSurvey,
									'organisation' => $organisation
								   )
			);
		}



		public function actionsendarray(){
			$this->renderPartial('sendarray');
		}
	}
