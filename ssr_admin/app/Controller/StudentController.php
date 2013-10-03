<?php
/**
 * StudentController
 *
 * @author        Takanori Kobashi kobashi@akane.waseda.jp
 * @since         1.0.0
 * @version       1.0.0
 * @copyright
 */
App::uses('AppController', 'Controller');
class StudentController extends AppController
{
    public $name = 'Student';
    public $uses = array('User','Student','UserConfidential');
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
        $users = $this->User->getStudentUsers();
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
        $user = $this->User->getStudentUser($user_id);
        $this->set('user', $user);

    }

    /**
     * add
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function add () {

         // POST値とトークンのチェック
        if ($this->request->is('Post') && !empty($this->request->data['User']) && !empty($this->request->data['Student'])) {

            $data = $this->request->data;

             // バリデーション処理
            $this->User->set($data['User']);
            $this->Student->set($data['Student']);
            $this->UserConfidential->set($data['UserConfidential']);

            $user_validates = $this->User->validates();
            $student_validates = $this->Student->validates();
            $user_confidential_validates = $this->UserConfidential->validates();

            if (!$user_validates || !$student_validates || !$user_confidential_validates) {
                $this->Session->setFlash('Validation Error. Please Confirm Input Values', 'default', array('class' => 'alert alert-error'));
                $this->redirect(array('controller' => 'Student', 'action' => 'add'));
            }

            //パスワードのハッシュ
            $data['UserConfidential']['password'] = AuthComponent::password($data['UserConfidential']['password']);

            // トランザクション処理始め
            $this->User->begin();
            $this->UserConfidential->begin();
            $this->Student->begin();

            if (!$this->User->saveAll($data)) {
                $this->User->rollback();
                $this->UserConfidential->rollback();
                $this->Student->rollback();
                throw new BadRequestException();
            }

            $this->User->commit();
            $this->UserConfidential->commit();
            $this->Student->commit();
            // トランザクション処理終わり

            $this->Session->setFlash('You successfully add account.', 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('controller' => 'student', 'action' => 'index'));
        }
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
        if (!$this->request->is('Post') || empty($this->request->data['User']) || empty($this->request->data['Student'])) {
            // POST値なし。
            $this->request->data = $this->User->findById($user_id);
            unset($this->request->data['User']['id']);
            return;
        }

        $user = $this->User->getStudentUser($user_id);

        $data = array();
        $data = $this->request->data;
        $data['User']['id'] =  $user_id;
        $data['Student']['id'] =  $user['Student']['id'];


        // バリデーション処理
        $this->User->set($data['User']);
        $this->Student->set($data['Student']);
        $user_validates = $this->User->validates();
        $student_validates = $this->Student->validates();
        if (!$user_validates || !$student_validates) {
            $this->Session->setFlash('Validation Error. Please Confirm Input Values', 'default', array('class' => 'alert alert-error'));
            $this->redirect(array('controller' => 'Student', 'action' => 'edit/'.$user_id));
        }

        // トランザクション処理始め
        $this->User->begin();
        $this->Student->begin();

        if (!$this->User->saveAll($data)) {
            $this->User->rollback();
            $this->Student->rollback();
            throw new BadRequestException();
        }

        $this->User->commit();
        $this->Student->commit();
        // トランザクション処理終わり

        $this->Session->setFlash('You successfully edit account.', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('controller' => 'Student', 'action' => 'show/'.$user_id));
    }

    /**
     * delete
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function delete($user_id = null)
    {
        //不正アクセス
        if (!isset($user_id)) {
            throw new BadRequestException();
        }

        //ユーザ情報の取得
        $user = $this->User->getStudentUser($user_id);

        //ユーザ情報の取得
        $data['UserConfidential']['id'] =  $user['UserConfidential']['id'];
        $data['UserConfidential']['delete'] =  '1';

        // トランザクション処理始め
        $this->UserConfidential->begin();

        if (!$this->UserConfidential->save($data)) {
            $this->UserConfidential->rollback();
            throw new BadRequestException();
        }

        $this->UserConfidential->commit();

        $this->Session->setFlash('You successfully delete account.', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('controller' => 'Student', 'action' => 'index'));

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
                'Completion.id' => null,
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
        $users = $this->User->getStudentUsersByConditions($conditions);
        $this->set('users', $users);

    }

    /**
     * analysis
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function analysis()
    {

    }
}
