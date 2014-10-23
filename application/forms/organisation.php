<?php

    return array(
        'elements' => array(
            'name' => array(
                'type' => 'text',
                'maxlength' => 128
            ),
            'address' => array(
                'type' => 'text',
            ),
            'email'=> array(
            	'type' => 'text',
            	'maxlength' => 255
            ),
            'phoneNumber' => array(
                'type' => 'text',
                'maxlength' => 11
            ),
            'terms' => array(
                'type' => 'textarea',
                'maxlength' => 65535
            )
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => 'Add',
            ),
        ),

    );
