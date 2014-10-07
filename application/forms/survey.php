<?php

	$organisations = \application\models\db\Organisation::model()->findAll();
	// var_dump($organisations);
    return array(
        'elements' => array(
            'name' => array(
                'type' => 'text',
                'maxlength' => 128
            )
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => 'Add',
            ),
        ),

    );