<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\form\Model as FormModel;

    class OrganisationEdit extends FormModel
    {
    	public $id,$terms;

		public function rules()
        {
        	return array(
	        	array('terms', 'required'),
                array('id', 'numerical'),
                array('terms', 'length', 'max'=>65535)
			);
        }
    }