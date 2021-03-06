<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\form\Model as FormModel;

    class Survey extends FormModel
    {
    	public $name,$orgId;

		public function rules()
        {
        	return array(
	        	array('name, orgId', 'required'),
				array('name', 'length', 'max'=>128),
                array('orgId', 'numerical', 'integerOnly'=>true)
			);
        }
    }