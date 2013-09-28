<?php
/**
 * CompletionController
 *
 * @author        Takanori Kobashi kobashi@akane.waseda.jp
 * @since         1.0.0
 * @version       1.0.0
 * @copyright
 */
App::uses('AppController', 'Controller');
class CompletionController extends AppController {

    public $name = 'Completion';
    public $uses = array('User','Student','Completion','GraduationCourse');
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
     * index
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function index()
    {
        //ユーザ情報の取得
        $users = $this->User->getCompletionUsers();
        $this->set('users', $users);
    }

    /**
     * show
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function show($user_id = null)
    {
        //不正アクセス
        if (!isset($user_id)) {
            throw new BadRequestException();
        }

        //ユーザ情報の取得
        $user = $this->User->getCompletionUser($user_id);
        $this->set('user', $user);

    }

    /**
     * edit
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function edit($user_id = null)
    {
        //不正アクセス
        if (!isset($user_id)) {
            throw new BadRequestException();
        }

        // POST値とトークンのチェック
        if (!$this->request->is('Post') || empty($this->request->data['User']) || empty($this->request->data['Completion'] )) {
            // POST値なし。
            $this->request->data = $this->User->getCompletionUser($user_id);
            unset($this->request->data['User']['id']);
            return;
        }

        $user = $this->User->getCompletionUser($user_id);

        $data = array();
        $data = $this->request->data;
        $data['User']['id'] =  $user_id;
        $data['Student']['id'] =  $user['Student']['id'];
        $data['Completion']['id'] =  $user['Completion']['id'];
        $data['Completion']['is_modified'] =  true;
        $data['GraduationCourse'] =  $this->request->data['Completion']['GraduationCourse'];
        $data['GraduationCourse']['id'] =  $user['Completion']['GraduationCourse']['id'];

        // バリデーション処理
        $this->User->set($data['User']);
        $this->Student->set($data['Student']);
        $this->GraduationCourse->set($data['GraduationCourse']);

        $user_validates = $this->User->validates();
        $student_validates = $this->Student->validates();
        $graduation_course_validates = $this->GraduationCourse->validates();


        if (!$user_validates || !$student_validates || !$graduation_course_validates) {
            $this->Session->setFlash('Validation Error. Please Confirm Input Values', 'default', array('class' => 'alert alert-error'));
            $this->redirect(array('controller' => 'Completion', 'action' => 'edit/'.$user_id));
        }


         if (!$this->User->saveAll($data)){
            $this->User->rollback();
            $this->Student->rollback();
            $this->Completion->rollback();
            $this->GraduationCourse->rollback();
            throw new BadRequestException();
        }

        if (!$this->GraduationCourse->save($data['GraduationCourse'])) {
            $this->User->rollback();
            $this->Student->rollback();
            $this->Completion->rollback();
            $this->GraduationCourse->rollback();
            throw new InternalErrorException();
        }

        $this->Session->setFlash('You successfully edit account.', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('controller' => 'Completion', 'action' => 'show/'.$user_id));

    }

    /**
     * student
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function student()
    {
        //在学生ユーザ情報の取得
        $users = $this->User->getStudentUsers();
        $this->set('users', $users);
    }

    /**
     * add
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function add($user_id = null)
    {
        //不正アクセス
        if (!isset($user_id)) {
            throw new BadRequestException();
        }

        // POST値とトークンのチェック
        if (!$this->request->is('Post') || empty($this->request->data['User']) || empty($this->request->data['Completion'] )) {
            // POST値なし。
            $this->request->data = $this->User->getCompletionUser($user_id);
            unset($this->request->data['User']['id']);
            return;
        }

        $user = $this->User->getCompletionUser($user_id);

        $data = array();
        $data = $this->request->data;
        $data['User']['id'] =  $user_id;
        $data['Student']['id'] =  $user['Student']['id'];
        $data['GraduationCourse'] =  $this->request->data['Completion']['GraduationCourse'];

         // バリデーション処理
        $this->User->set($data['User']);
        $this->Student->set($data['Student']);
        $this->GraduationCourse->set($data['GraduationCourse']);

        $user_validates = $this->User->validates();
        $student_validates = $this->Student->validates();
        $graduation_course_validates = $this->GraduationCourse->validates();


        if (!$user_validates || !$student_validates || !$graduation_course_validates) {
            $this->Session->setFlash('Validation Error. Please Confirm Input Values', 'default', array('class' => 'alert alert-error'));
            $this->redirect(array('controller' => 'Completion', 'action' => 'edit/'.$user_id));
        }


         if (!$this->User->saveAll($data)){
            $this->User->rollback();
            $this->Student->rollback();
            $this->Completion->rollback();
            $this->GraduationCourse->rollback();
            throw new BadRequestException();
        }

        $data['GraduationCourse']['completion_id'] =  $this->Completion->id;
        if (!$this->GraduationCourse->save($data['GraduationCourse'])) {
            $this->User->rollback();
            $this->Student->rollback();
            $this->Completion->rollback();
            $this->GraduationCourse->rollback();
            throw new InternalErrorException();
        }

        $this->Session->setFlash('You successfully add account.', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('controller' => 'Completion', 'action' => 'index'));

    }

    /**
     * create_certification
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function create_certification()
    {

    }

    /**
     * notify_event
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function notify_event()
    {

    }

    /**
     * show
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function analysis()
    {

    }
}
