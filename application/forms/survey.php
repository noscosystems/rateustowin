<?php

    use \application\models\db\Organisation;

    $organisation = Organisation::model()->findAll();
    $orgArr = [];

    foreach ($organisation as $org)
        $orgArr[$org->id] = $org->name;

    return array(
        'elements' => array(
            'orgId' => array(
                'type' => 'dropdownlist',
                'items' => $orgArr,
                'prompt' => 'Please Select'
            ),
            'name' => array(
                'type' => 'text',
                'maxlength' => 30
            ),
        ),
        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => 'Add',
            ),
        ),
        
    );