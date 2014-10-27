<?php

    return array(
        'elements' => array(
            'name' => array(
                'type' => 'hidden',
                'maxlength' => 128
            ),
			'terms' => array(
                'type' => 'textarea',
                'maxlength' => 65535
            ),
            'id' => array(
            	'type' => 'hidden'
            )
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => 'Add',
            ),
        ),

    );