<?php


class EventsUser extends AppModel {
    public $name = 'EventsUser';
    public $belongsTo = array('User','Event');

}
