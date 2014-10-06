<?php

	//namespace application\modules\admin\controllers;

    use CException as Exception;
	use application\components\Form;
	use application\components\Controller;

	class DefaultController extends Controller{

		public function actionIndex(){

			// if (Yii::app()->user->isGuest)
			// 	$this->redirect(array('/home'));
			//else
			//$form = new Form('application.forms.organisation', new Organisation);

			$this->render('index');
		}
	}
