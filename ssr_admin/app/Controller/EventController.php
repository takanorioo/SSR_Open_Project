<?php
/**
 * EventController
 *
 * @author        Takanori Kobashi kobashi@akane.waseda.jp
 * @since         1.0.0
 * @version       1.0.0
 * @copyright
 */
App::uses('AppController', 'Controller');
class EventController extends AppController {

    public $name = 'Event';
    public $uses = array('Event');
    public $helpers = array('Html', 'Form',);
    public $layout = 'base';

    /**
     * beforeFilter
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->deny();
    }
    /**
     * event
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function index()
    {
         //イベント情報の取得
        $events = $this->Event->getEvents();
        $this->set('events',$events);
    }

    /**
     * show
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function show()
    {
        if (empty($this->request->id)) {
            throw new BadRequestException();
        }
        $event_id = $this->request->id;

         //イベント情報の取得
        $users = $this->Event->getEventUsers($event_id);
        $this->set('users',$users);
    }

    /**
     * add
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function add()
    {

    }

    /**
     * add
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function delete()
    {

    }
}
