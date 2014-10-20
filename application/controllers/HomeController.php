<?php

    namespace application\controllers;

    use Yii;
    use CException as Exception;
    use application\components\Controller;

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
            $organisation = \application\models\db\Organisation::model()->findByPk(3);
            $logoImg = $organisation->LogoImg;
            $prizeImg = $organisation->PrizeImg;
            $ageGroup = \application\models\db\Option::model()->findAllByAttributes( array( 'column' => 'ageGroup' ));
            $sex = \application\models\db\Option::model()->findAllByAttributes( array( 'column' => 'sex' ));

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
                                        'prizeImg' => $prizeImg,
                                        'logoImg' => $logoImg,
                                        'question' => $question,
                                        'sex' => $sex,
                                        'ageGroup' => $ageGroup
                                    )
            );
        }

    }
