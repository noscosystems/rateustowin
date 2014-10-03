<?php

	namespace application\controllers;

	use \Yii;
    use \CException as Exception;
	use \application\components\Form;
	use \application\components\Controller;
	use \application\components\UserIdentity;

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
}