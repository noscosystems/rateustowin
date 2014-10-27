<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\form\Model as FormModel;

    class OrganisationEdit extends FormModel
    {
    	public $id,$terms,$name;

		public function rules()
        {
        	return array(
	        	array('terms', 'required'),
                array('id', 'numerical'),
                array('terms', 'length', 'max'=>65535),
                array('name', 'length', 'max'=>128),
			);
        }
    }