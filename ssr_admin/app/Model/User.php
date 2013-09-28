<?php


class User extends AppModel
{
    public $name = 'User';
    public $hasOne = array('Student','Completion','UserConfidential');
    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '名前を入力してください'
            ),
        ),
        'nationality' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '住所を入力してください'
            ),
        ),
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
        'birthday' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '住所を入力してください'
            ),
        ),
        'gender' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '住所を入力してください'
            ),
        ),
    );



    public function getStudentUser($user_id)
    {
        $result = $this->find('first', array(
            'conditions' => array(
                'User.id' => $user_id,
                'UserConfidential.delete' => '0',
            ),
        ));
        return $result;
    }

    public function getStudentUsers()
    {
        $result = $this->find('all', array(
            'conditions' => array(
                'NOT' => array('Student.id' => null),
                'Completion.id' => null,
                'UserConfidential.delete' => '0',
            ),
        ));
        return $result;
    }

    public function getCompletionUser($user_id)
    {
        $result = $this->find('first', array(
            'conditions' => array(
                'User.id' => $user_id,
                'UserConfidential.delete' => '0',
            ),
            'recursive' => 2,
        ));
        return $result;
    }

    public function getCompletionUsers()
    {
        $result = $this->find('all', array(
            'conditions' => array(
                'NOT' => array('Student.id' => null),
                'NOT' => array('Completion.id' => null),
                'UserConfidential.delete' => '0',
            ),
             'recursive' => 2,
        ));
        return $result;
    }

}
