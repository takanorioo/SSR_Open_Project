<?php


class Certification extends AppModel {
    public $name = 'Certification';
    public $belongsTo = array('User');


    public $validate = array(
        'type' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => ''
            ),
        ),
        'completion_day' => array(
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

    public function getCertification()
    {
        $result = $this->find('all', array(
            'conditions' => array(
            ),
            'recursive' => 2,
        ));
        return $result;
    }

}
