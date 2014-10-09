<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\form\Model as FormModel;

    class Survey extends FormModel
    {
    	public $name,$organisationId;

		public function rules()
        {
        	return array(
	        	array('name,organsationId', 'required'),
				array('name', 'length', 'max'=>128),
                array('organisationId', 'numerical')
			);
        }
    }