<?php


class Event extends AppModel {
    public $name = 'Event';
    public $hasMany = array('CompletionEvent');


    public function getEvents()
    {
        $result = $this->find('all', array(
            'conditions' => array(
            ),
        ));
        return $result;
    }

    public function getEventUsers($event_id)
    {
        $result = $this->find('first', array(
            'conditions' => array(
                'Event.id' => $event_id,
            ),
            'recursive' => 4,
        ));
        return $result['CompletionEvent'];
    }


}
