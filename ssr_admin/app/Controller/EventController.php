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
    public function add()
    {
        // POST値とトークンのチェック
        if ($this->request->is('Post') && !empty($this->request->data['Event'])) {

            $data = $this->request->data;

             // バリデーション処理
            $this->Event->set($data['Event']);
            $event_validates = $this->Event->validates();

            if (!$event_validates) {
                $this->Session->setFlash('Validation Error. Please Confirm Input Values', 'default', array('class' => 'alert alert-error'));
                $this->redirect(array('controller' => 'Event', 'action' => 'add'));
            }

            // トランザクション処理始め
            $this->Event->begin();

            if (!$this->Event->save($data)) {
                $this->Event->rollback();
                throw new BadRequestException();
            }

            $this->Event->commit();
            // トランザクション処理終わり

            $this->Session->setFlash('You successfully add account.', 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('controller' => 'Event', 'action' => 'index'));
        }
    }

    /**
     * edit
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function edit($event_id = null)
    {
        //不正アクセス
        if (!isset($event_id)) {
            throw new BadRequestException();
        }

        // POST値とトークンのチェック
        if (!$this->request->is('Post') || empty($this->request->data['Event'])) {

            // POST値なし。
            $this->request->data = $this->Event->findById($event_id);
            unset($this->request->data['Event']['id']);
            return;
        }


        $data = array();
        $data = $this->request->data;
        $data['Event']['id'] =  $event_id;

        // バリデーション処理
        $this->Event->set($data['Event']);
        $event_validates = $this->Event->validates();

        if (!$event_validates) {
            $this->Session->setFlash('Validation Error. Please Confirm Input Values', 'default', array('class' => 'alert alert-error'));
            $this->redirect(array('controller' => 'Event', 'action' => 'add'));
        }

        if (!$this->Event->save($data['Event'])) {
            $this->Event->rollback();
            throw new BadRequestException();
        }

        $this->Event->commit();

        $this->Session->setFlash('You successfully edit account.', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('controller' => 'Event', 'action' => 'index'));
    }

    /**
     * add
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function delete($event_id = null)
    {
        //不正アクセス
        if (!isset($event_id)) {
            throw new BadRequestException();
        }
         //イベント情報の取得
        $event = $this->Event->getEvent($event_id);

        // トランザクション処理始め
        $this->Event->begin();

        if (!$this->Event->delete($event['Event']['id'])) {
            $this->Event->rollback();
            throw new BadRequestException();
        }

        $this->Event->commit();

        $this->Session->setFlash('You successfully delete account.', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('controller' => 'Event', 'action' => 'index'));

    }
}
