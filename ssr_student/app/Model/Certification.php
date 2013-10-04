<?php


class Certification extends AppModel {
    public $name = 'Certification';

    public $validate = array(
        'type' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => ''
            ),
        ),
        'count' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => ''
            ),
        ),
        'purpose' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => ''
            ),
        ),
    );

}
