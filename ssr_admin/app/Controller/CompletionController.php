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
    public $uses = array('User','Student','Completion','GraduationCourse','UserConfidential','Certification');
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
     * serach
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function search()
    {
        if(count($this->request->query) > 0) {

            // 検索ワードの引き継ぎ
            $this->request->data['Search'] = $this->request->query;
            $this->set('query', $this->request->query);


            // 検索条件の作成
            $qr = $this->request->query;

            $conditions = array();

            //在学生の条件
            $conditions = array_merge_recursive($conditions, array('AND' => array(
                'NOT' => array('Student.id' => null),
                'NOT' => array('Completion.id' => null),
                'UserConfidential.delete' => '0',
            )));

            if(isset($qr['name']) && $qr['name'] !== "") {
                $conditions = array_merge_recursive($conditions, array('AND' => array(
                    'User.name LIKE' => '%'.$qr['name'].'%',
                )));
            }
            if(isset($qr['number']) && $qr['number'] !== "") {
                $conditions = array_merge_recursive($conditions, array('AND' => array(
                    'Student.number LIKE' => '%'.$qr['number'].'%',
                )));
            }
            if(isset($qr['grade']) && is_array($qr['grade'])) {
                $conditions = array_merge_recursive($conditions, array('AND' => array(
                    'Student.grade' => array_values($qr['grade'])
                )));
            }
            if(isset($qr['gender']) && is_array($qr['gender'])) {
                $conditions = array_merge_recursive($conditions, array('AND' => array(
                    'User.gender' => array_values($qr['gender'])
                )));
            }
            if(isset($qr['department']) && is_array($qr['department'])) {
                $conditions = array_merge_recursive($conditions, array('AND' => array(
                    'Student.department' => array_values($qr['department'])
                )));
            }
            if(isset($qr['major']) && is_array($qr['major'])) {
                $conditions = array_merge_recursive($conditions, array('AND' => array(
                    'Student.major' => array_values($qr['major'])
                )));
            }
        } else {
            $conditions = array('User.id' => -1);
        }

        //ユーザ情報の取得
        $users = $this->User->getCompletionUsersByConditions($conditions);
        $this->set('users', $users);

    }

    /**
     * certification
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function certification()
    {
        //ユーザ情報の取得
        $users = $this->Certification->getCertification();
        $this->set('users', $users);
    }

}
