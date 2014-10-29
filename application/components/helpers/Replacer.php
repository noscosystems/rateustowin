<?php

    namespace application\components\helpers;

    use \Yii;
    use \CException;
    use \application\models\db\Organisation;

    class Replacer extends \CComponent
    {
    	public static function swap($id){

    		$path = Yii::getPathOfAlias('application.views.Uploads');
			$str = file_exists($path)?file_get_contents($path.'\aboutus.txt'):'';

			$organisation = Organisation::model()->findByPk($id);

			if ($organisation){
				if ($str!=''){
	    			$str = str_replace('[address]', $organisation->address, $str);
	    			$str = str_replace('[email]', $organisation->email, $str );
	    			$str = str_replace('[phone]', $organisation->phoneNumber, $str );
	    		}
	    		else
	    			return false;
	    	}
    		else 
    			return false;

    		return $str;
    	}
    }