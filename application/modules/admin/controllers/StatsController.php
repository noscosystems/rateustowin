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
            $enquiryForm = new Form ('application.forms.answersenquiry', new Answersenquiry);
        	
            if ($orgSelect->submitted() && $orgSelect->validate()){

                   
                $branch = Yii::app()->db->createCommand()
                            ->select('b.id, b.name')
                            ->from('branches b')
                            ->where('b.organisationId=:id', array(':id' => $orgSelect->model->id))
                            ->queryAll();

                foreach ($branch as $k => $v){
                    $enquiryForm->elements['branch']->items[$v['id']] = $v['name'];
                }
            }

            if ($enquiryForm->submitted() && $enquiryForm->validate()){
                    $frm = $enquiryForm->model;
                    $startDate = $frm->startDate;
                    $endDate = $frm->endDate;
                    $today = strtotime('Today');
                    if ($startDate>$endDate)
                        $frm->addError('startDate','Starting date greater than ending date.');
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
                    if (empty($frm->errors)){
                        $report = Yii::app()->db->createCommand()
                                ->select('cust.id, cust.firstName, br.name branchName,surv.name surveyName, ans.answerTxt')
                                ->from('customer cust')
                                ->join('answersheet ansSheet', 'ansSheet.customerId=cust.id')
                                ->join('branches br', 'ansSheet.branchId=br.id')
                                ->join('survey surv', 'surv.id=ansSheet.surveyId')
                                ->join('answer ans', 'ansSheet.id=ans.ansSheetId')
                                ->where('br.id=:id', array(':id' => $enquiryForm->model->branch))
                                ->andWhere('ansSheet.created between :startDate and :endDate',
                                                array(':startDate'=>1, ':endDate'=>99999999999999999999999)
                                           )
                                ->queryAll();
                    }
                }

                $report_transp = [];
                if (isset($report) && !empty($report)){
                    foreach ($report as $ind => $row){

                        
                        $answer = $row['answerTxt'];
                        unset($row['answerTxt']);

                        if ($ind == 0 ){
                            unset($row['id']); 
                            $report_transp[$ind]  = $row;
                            $report_transp[$ind]['Q'.$ind] = $answer;
                        }
                        elseif (isset($report[($ind-1)])){

                            if ($report[($ind-1)]['id'] == $report[$ind]['id']){
                                $report_transp[$ind-$ind]['Q'.$ind] = $answer;
                            }
                            else{
                                unset($row['id']);
                                $report_transp[$ind]  = $row;
                                $report_transp[$ind]['Q'.$ind] = $answer;
                            }
                            
                        }
                        
                    }
                }

                echo'<pre>';
                var_dump($report_transp);
                echo'</pre>';
                exit;

                $enquiryForm->model->startDate = date("m/d/Y");
                $enquiryForm->model->endDate = date("m/d/Y");
        	$this->render('index', array(
                                        'orgSelect' => $orgSelect,
                                        'enquiryForm' => isset($enquiryForm)?$enquiryForm:'',
                                        'report' => isset($report_transp)?$report_transp:''
                                   )
            );
        }
    }