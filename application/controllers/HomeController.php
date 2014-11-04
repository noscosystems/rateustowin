<?php

    namespace application\controllers;

    use Yii;
    use CException as Exception;
    use application\components\Controller;
    use application\components\helpers\Replacer;
    use \application\models\db\Branch;

    class HomeController extends Controller
    {

        /**
         * Action: Index
         *
         * @access public
         * @return void
         */
        public function actionIndex()
        {
            $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $branch = substr($url, 0, strpos($url, '.'));

            if ($branch!='' && $branch!='127' && $branch!='$branch' && $branch!='rateustowin' && $branch!='wwww'){
                $search = Branch::model()->findByAttributes(array ('name' => $branch));
                $organisation = $search->Organisation;
            }
            else{
                $organisation = \application\models\db\Organisation::model()->findByPk(3);
            }

            $logoImg = $organisation->LogoImg;
            $prizeImg = $organisation->PrizeImg;
            // $options = \application\models\db\Option::model()->findAllByAttributes(array('column' => array('sex','ageGroup') ));
            $ageGroup = \application\models\db\Option::model()->findAllByAttributes( array( 'column' => 'ageGroup' ));
            $sex = \application\models\db\Option::model()->findAllByAttributes( array( 'column' => 'sex' ));
            $aboutus = Replacer::swap($organisation->id);

            $question = Yii::app()->db->createCommand()
                            ->select('q.id, q.questTxt, anstyp.type, s.id as surveyId')
                            ->from('question q')
                            ->join('survey s', 'q.surveyId=s.id')
                            ->join('answertype anstyp', 'q.answerType=anstyp.id')
                            ->join('organisation org', 's.orgId=org.id')
                            ->where('s.active=1', array())
                            ->andWhere('org.id=:orgId', array(':orgId' => $organisation->id))
                            ->order('q.id')
                            ->queryAll();

            $this->render('index', array(
                                        'terms' => $organisation->terms,
                                        'prizeImg' => $prizeImg,
                                        'logoImg' => $logoImg,
                                        'question' => $question,
                                        'sex' => $sex,
                                        'ageGroup' => $ageGroup,
                                        'aboutus' => $aboutus
                                    )
            );
        }

        public function actionfillanswersheet(){
            $answers = json_decode($_REQUEST['answers']);
            $ansSheet = new \application\models\db\Answersheet;
            $customer = new \application\models\db\Customer;
            
            $question = [];
            $erros = [];
            
            foreach ($answers as $index => $answer){
                if ($index == 'customer' ){
                    foreach ($answer as $key => $attr){
                        switch ($key){
                            case 'surveyId':
                                $ansSheet->surveyId = $attr;
                                break;
                            case 'firstName':
                                $customer->firstname = $attr;
                                break;
                            case 'sex':
                                $customer->sex = $attr;
                                break;
                            case 'ageGroup':
                                $customer->ageGroup = $attr;
                                break;
                            case 'email':
                                $customer->email = $attr;
                                break;
                            case 'optIn':
                                $customer->optIn = $attr;
                                break;
                        }

                    }
                }
                else{
                    $question[$index] = $answer;
                }
            }
            $customer->ipAddress = $_SERVER['REMOTE_ADDR'];
            $customer->created = time();
            if($customer->validate()){
                if ($customer->save()){
                    $ansSheet->customerId = $customer->id;
                    $ansSheet->created = strtotime('Today');
                    $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                    $branch = substr($url, 0, strpos($url, '.'));
                    if ($branch!='' && $branch!='127' && $branch!='$branch' && $branch!='rateustowin' && $branch!='wwww')
                        $search = Branch::model()->findByAttributes(array ('name' => $branch));
                    if($search)
                        $ansSheet->branchId = $search->id;

                    if ($ansSheet->validate()){
                        if ($ansSheet->save()){
                            foreach ($question as $key => $value){
                                $answer = new \application\models\db\Answer;
                                $answer->ansSheetId = $ansSheet->id;
                                $answer->questId = $key;
                                $answer->answerTxt = $value;
                                if ($answer->validate())
                                    $answer->save();
                                else{
                                    foreach ($answer->errors as $error)
                                        $error[] = $error;
                                }
                            }
                        }
                    }
                }
            }
            else {
                foreach($customer->errors as $error);
                    $errors[] = $error;
            }

            if (!empty($errors))
                echo$errorsJSON = json_encode($errors);
            else
                echo json_encode('Survey completed successfully!');

        }

    }

    