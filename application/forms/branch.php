<?php

	use \application\models\db\Organisation;

    $organisation = Organisation::model()->findAll();
   	$orgArr = [];

    foreach ($organisation as $org)
    	$orgArr[$org->id] = $org->name;

    return array(
        'elements' => array(
        	'organisationId' => array(
        		'type' => 'dropdownlist',
        		'items' => $orgArr,
                'prompt' => 'Please Select'
            ),
            'name' => array(
                'type' => 'text',
                'maxlength' => 30
            ),
            'address' => array(
                'type' => 'text',
                'maxlength' => 255,

            ),
            'county' => array(
            	'type' => 'text',
            	'maxlenght' => 64
            ),
            'email'=> array(
                'type' => 'text',
            	'maxlength' => 255
            ),
            'phoneNum' => array(
                'type' => 'text',
                'maxlength' => 11
            ),
            'town' => array(
            	'type' => 'text',
            	'maxlenght' => 64
            ),
            'postcode' => array(
            	'type' => 'text',
            	'maxlenght' => 8
            ),
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => 'Add',
            ),
        ),

    );