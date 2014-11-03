<?php

    use \Yii;
    use \CException as Exception;
    use \application\components\form\Form;
    use \application\components\Controller;
    use \application\models\form\Orgselect;
    use \application\models\form\Answersenquiry;

    class StatsController extends Controller
    {        

        public function actionIndex()
        {
            $orgSelect = new Form('application.forms.orgselect', new Orgselect);
        	
            if ($orgSelect->submitted() && $orgSelect->validate()){

                $enquiryForm = new Form ('application.forms.answersenquiry', new Answersenquiry);    
                $branch = Yii::app()->db->createCommand()
                            ->select('b.id, b.name')
                            ->from('branches b')
                            ->where('b.organisationId=:id', array(':id' => $orgSelect->model->id))
                            ->queryAll();

                foreach ($branch as $k => $v){
                    $enquiryForm->elements['branch']->items[$v['id']] = $v['name'];

                }

                if ($enquiryForm->submitted() && $enquiryForm->validate()){
                    // $sql =   SELECT customer.firstName, survey.name, question.questTxt, answer.answerTxt FROM answer JOIN answersheet ON answer.ansSheetId = answersheet.id JOIN branches as br ON `answersheet`.`branchId` = `br`.`id` JOIN customer ON answersheet.customerId = customer.id JOIN organisation ON `br`.organisationId = organisation.id JOIN survey ON survey.orgId = organisation.id JOIN question ON survey.id = question.surveyId WHERE `br`.`id` = 2
                }

                // $form->elements['name']->items = array();

                // or add one onto the end:

                // $form->elements['name']->items[];


            }

        	$this->render('index', array('orgSelect' => $orgSelect, 'enquiryForm' => isset($enquiryForm)?$enquiryForm:''));
        }
    }