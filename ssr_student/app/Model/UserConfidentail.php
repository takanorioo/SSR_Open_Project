<?php


class UserConfidential extends AppModel {
    public $name = 'UserConfidential';

    public $validate = array(
        'email' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'メールアドレスを入力してください'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'そのメールアドレスは既に登録されています'
            )
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'パスワードを入力してください'
            ),
        ),
    );
}
