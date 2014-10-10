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

		public function actionIndex(){

			if (Yii::app()->user->isGuest)
				$this->redirect(array('/home'));
			else if (Yii::app()->user->priv<1)
				$this->redirect(array('/home'));
			else if (Yii::app()->user->priv==1){
				$form = new Form('application.forms.organisation', new Organisation);
				$formBranch = new Form('application.forms.branch', new Branch);
				$formSurvey = new Form('application.forms.survey', new Survey);
			}

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
				$survey = new Survey;
				$survey = $formSurvey->model->attributes;
				$survey->save();

				for ($i=0; $i<count($_POST['question']); $i++){
					if ($_POST['question'][$i]!='' && $_POST['answerType'][$i]!=''){
						$question = new Question;
						$question->questionTxt = $_POST['question'][$i];
						$question->sruveyId = $survey->id;
						$question->answerType = $_POST['answerType'];
						if ($question->validate())
							$question->save();
					}
				}
			}

			$this->render('index', array('form'=>$form, 'formBranch' => $formBranch, 'formSurvey' => $formSurvey));
		}
	}
