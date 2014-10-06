<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\form\Model as FormModel;

    class Organisation extends FormModel
    {
    	public $name,$address,$email,$phoneNumber;

		public function rules()
        {
        	return array(
	        	array('name, address, email, phoneNumber', 'required'),
				array('name', 'length', 'max'=>128),
				array('email', 'length', 'max'=>255),
				array('phoneNumber', 'length', 'max'=>11)
			);
        }
    }