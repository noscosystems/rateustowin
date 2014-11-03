<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\form\Model as FormModel;

    class Answersenquiry extends FormModel
    {
    	public $startDate,$endDate,$branch;

		public function rules()
        {
        	return array(
	        	array('startDate, endDate, branch', 'required'),
                array('branch', 'numerical', 'integerOnly'=>true),
                array('startDate', 'date', 'format' => 'MM/dd/yyyy', 'timestampAttribute' => 'startDate'),
                array('endDate', 'date', 'format' => 'MM/dd/yyyy', 'timestampAttribute' => 'endDate')
			);
        }
    }