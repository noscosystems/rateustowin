<?php

    use \CException as Exception;
	use \application\components\Form;
	use \application\components\Controller;
	use \application\models\db\Organisation;
	use \application\models\db\Branch;

	class DefaultController extends Controller{

		public function actionIndex(){

			if (Yii::app()->user->isGuest)
				$this->redirect(array('/home'));
			else
				$form = new Form('application.forms.organisation', new Organisation);

			if ($form->submitted() && $form->validate()){

			}

			$this->render('index');
		}
	}
