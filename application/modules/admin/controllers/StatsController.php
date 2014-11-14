<?php

    use \Yii;
    use \CException as Exception;
    use \application\components\form\Form;
    use \application\components\Controller;
    use \application\models\form\Orgselect;
    use \application\models\form\Answersenquiry;


    class StatsController extends Controller
    {        

        public function actionIndex($choose)
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
                    if (empty($frm->errors)){
                        //Query that joins a couple of tables
                        //and retrieves a customer's name,
                        //survey that he completed and it's name,
                        //branch that survey belongs to, the branch name,
                        //and the customer's actual answers.
                        $report = Yii::app()->db->createCommand()
                                ->select('cust.id, cust.firstName Customer name, br.name Branch name, surv.name Survey name, ans.answerTxt')
                                ->from('customer cust')
                                ->join('answersheet ansSheet', 'ansSheet.customerId=cust.id')
                                ->join('branches br', 'ansSheet.branchId=br.id')
                                ->join('survey surv', 'surv.id=ansSheet.surveyId')
                                ->join('answer ans', 'ansSheet.id=ans.ansSheetId')
                                ->where('br.id=:id', array(':id' => $enquiryForm->model->branch))
                                ->andWhere('ansSheet.created between :startDate and :endDate',
                                                array(':startDate'=>$startDate, ':endDate'=>$endDate)
                                           )
                                ->queryAll();
                    }
                }

                $report_transp = []; //an array thatwould serv us for "transposing"
                //the information we have in a more suitable for viewing by the admin format.
                if (isset($report) && !empty($report)){ // if our query returned some rows 

                    $i=1; //a buffer variable that we use for the question numbering.
                    foreach ($report as $ind => $row){//A loop that cycles through all the rows from the query.

                        $answer = $row['answerTxt'];
                        unset($row['answerTxt']);
                        $last = '';

                        if (isset($report_transp[0])) // a checkup to get our newly rearranged array's last index.
                            $last = count($report_transp)-1;

                        if ($ind == 0 ){ //If we are pointing at row one of our query we create our first row
                            //of our new rearranged array
                            $report_transp[$ind]  = $row;
                            $i=1; // reset our buffer variable, everytime we create a new "row"
                            $report_transp[$ind]['Q'.$i] = $answer;
                        
                        }
                        elseif (isset($report_transp[$last])){//if we have an already created element.

                            if ($report_transp[$last]['id'] == $report[$ind]['id']) 
                                $report_transp[$last]['Q'.$i] = $answer;
                            else{
                                $report_transp[] = $row;
                                $i=1; // reset our buffer variable, everytime we create a new "row"
                                $report_transp[(count($report_transp)-1)]['Q'.$i] = $answer;
                            }
                            
                        }
                        $i++;
                    }

                    foreach ($report_transp as $ind => $row){
                        unset($report_transp[$ind]['id']);
                        unset($row['id']);
                        $sum ='';
                        $rowLength = count($row)-1;
                        $pointer = 0;

                        foreach ($row as $ind2 => $col){
                            
                            if (preg_match('/^(1|2|3)$/', $col))
                                $sum+=$col;
                            if ($pointer == $rowLength)
                                $report_transp[$ind]['Total'] = $sum;
                        
                            $pointer++;
                        }
                    }

                    $headerArray = array('Customer name','Branch name','Survey name','Q1','Q2','Q3','Q4','Q5','Q6','Total')

                }

                

            if (isset($report_transp) && !empty($report_transp) && $choose == 'download' ){
                $this->renderPartial('excel', array('report' => $report_transp, 'headerArray' => $headerArray));
            }
            elseif (isset($report_transp) && !empty($report_transp) && $choose == 'view' ){
            	$this->render('viewstats', array(
                                            'startDate' => $startDate,
                                            'endDate' => $endDate,
                                            'report' => isset($report_transp)?$report_transp:''
                                        )
                );
            }
            else{
                $enquiryForm->model->startDate = date("d/m/Y");
                $enquiryForm->model->endDate = date("d/m/Y");
                $this->render('index', array(
                                            'orgSelect' => $orgSelect,
                                            'enquiryForm' => isset($enquiryForm)?$enquiryForm:''
                                       )
                );
            }
            
        }

    }