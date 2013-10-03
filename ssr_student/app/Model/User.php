<?php


class User extends AppModel {
    public $name = 'User';
    public $hasOne = array('Student','Completion');
    public $hasMany = array('EventsUser');

    public $validate = array(
        'adress' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '住所を入力してください'
            ),
        ),
        'phone' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '電話番号を入力してください'
            ),
        ),
    );

    public function getStudentUser($user_id) {

        $result = $this->find('first', array(
            'conditions' => array(
                'User.id' => $user_id,
            ),
        ));
        return $result;
    }

    public function getCompletionUser($user_id) {

        $result = $this->find('first', array(
            'conditions' => array(
                'User.id' => $user_id,
            ),
            'recursive' => 2,
        ));
        return $result;
    }
}
