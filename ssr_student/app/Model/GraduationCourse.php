<?php


class GraduationCourse extends AppModel {
    public $name = 'GraduationCourse';

    public $validate = array(
        'business_type' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '業界を入力してください'
            ),
        ),
        'department' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '所属を入力してください'
            ),
        ),
        'role' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '役職を入力してください'
            ),
        ),
    );


}
