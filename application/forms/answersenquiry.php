<?php

    return array(
        'title' => Yii::t('application', 'Please provide your login credentials.'),

        'elements' => array(
            'branch' => array(
                'type' => 'dropdownlist',
                'prompt' => 'Please Select'
            ),
            'startDate' =>array(
            	'type' => 'text',
            ),
            'endDate' => array(
                'type' => 'text',
            )
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => Yii::t('application', 'Select'),
            ),
        ),
    );