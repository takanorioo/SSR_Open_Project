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
    public $uses = array('Event','EventsUser','User');
    public $helpers = array('Html', 'Form',);
    public $layout = 'completion';

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

         //イベントの取得
        $events = $this->Event->getEvents($this->me['User']['id']);

        $this->set('events',$events);
        $this->set('user_id',$this->me['User']['id']);
    }

    /**
     * show
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function show($event_id = null)
    {
        if (!isset($event_id)) {
            throw new BadRequestException();
        }
        $this->set('event_id',$event_id);

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
    public function add($event_id = null)
    {

        if (!isset($event_id)) {
            throw new BadRequestException();
        }

        // トランザクション処理始め
        $data = array();
        $data['EventsUser']['user_id'] =  $this->me['User']['id'];
        $data['EventsUser']['event_id'] =  $event_id;
        $this->EventsUser->begin();

        if (!$this->EventsUser->save($data)) {
            $this->EventsUser->rollback();
            throw new BadRequestException();
        }

        $this->EventsUser->commit();
        // トランザクション処理終わり

        $this->Session->setFlash('イベントに申し込みました.', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('controller' => 'Event', 'action' => 'index'));

    }

    /**
     * add
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function delete($events_users_id = null)
    {
        //不正アクセス
        if (!isset($events_users_id)) {
            throw new BadRequestException();
        }

        // トランザクション処理始め
        $this->EventsUser->begin();

        if (!$this->EventsUser->delete($events_users_id)) {
            $this->EventsUser->rollback();
            throw new BadRequestException();
        }

        $this->EventsUser->commit();

        $this->Session->setFlash('イベントに申し込みを取り消しました', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('controller' => 'Event', 'action' => 'index'));

    }
}
