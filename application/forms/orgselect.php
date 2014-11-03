<?php

	use \application\models\db\Organisation;

    $organisation = Organisation::model()->findAll();
   	$orgArr = [];

    foreach ($organisation as $org)
    	$orgArr[$org->id] = $org->name;

    return array(
        'elements' => array(
        	'id' => array(
        		'type' => 'dropdownlist',
        		'items' => $orgArr,
                'prompt' => 'Please Select'
            ),
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => 'Select',
            ),
        )

    );