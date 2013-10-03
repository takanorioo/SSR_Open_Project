<?php


class Event extends AppModel {

    public $name = 'Event';
    // public $hasOne = array('EventsUser');
    public $hasMany = array('EventsUser');

    public $validate = array(
         'name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '氏名を入力してください'
            ),
        ),
        'location' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '場所を入力してください'
            ),
        ),
        'date' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => '日時を入力してください'
            ),
        ),
    );

    public function getEvents($user_id)
    {
        $result = $this->find('all', array(
            'conditions' => array(
            ),
            'order' => 'Event.date ASC'
        ));
        return $result;
    }
}
