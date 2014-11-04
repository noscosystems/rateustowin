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
                    // SELECT `cust`.`firstName`, `br`.`name`, `surv`.`name`,`surv`.`id`, `quest`.`questTxt`, `ans`.`answerTxt`
                    //     FROM `customer` AS `cust`
                    //     JOIN `answersheet` AS `ansSheet`
                    //     ON `ansSheet`.`customerId` = `cust`.`id`
                    //     JOIN `branches` AS `br`
                    //     ON `ansSheet`.`branchId` = `br`.`id`
                    //     JOIN `survey` AS `surv`
                    //     ON `surv`.`id` = `ansSheet`.`surveyId`
                    //     JOIN `answer` AS `ans`
                    //     ON `ansSheet`.`id` = `ans`.`ansSheetId`
                    //     JOIN `question` AS `quest`
                    //     ON `quest`.`id` = `ans`.`questId`
                    //     WHERE `br`.`id` = 2 AND `ansSheet`.`created` BETWEEN :startDate AND :endDate
                    
                }

                // $form->elements['name']->items = array();

                // or add one onto the end:

                // $form->elements['name']->items[];


            }

        	$this->render('index', array('orgSelect' => $orgSelect, 'enquiryForm' => isset($enquiryForm)?$enquiryForm:''));
        }
    }