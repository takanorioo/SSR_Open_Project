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
    public $layout = 'student';

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

        if ($this->me['user_type'] !== STUDENT ) {
            throw new BadRequestException();
        }
    }

    /**
     * index
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function index()
    {

    }

    /**
     * show
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function show()
    {
        //ユーザ情報の取得
        $user = $this->User->getStudentUser($this->me['User']['id']);
        $this->set('user', $user);

    }

    /**
     * edit
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function edit()
    {
        // POST値とトークンのチェック
        if (!$this->request->is('Post') || empty($this->request->data['User']) || empty($this->request->data['Student'])) {
            // POST値なし。
            $this->request->data = $this->User->findById($this->me['User']['id']);
            unset($this->request->data['User']['id']);
            return;
        }

        $user = $this->User->getStudentUser($this->me['User']['id']);

        $data = array();
        $data = $this->request->data;
        $data['User']['id'] =  $this->me['User']['id'];
        $data['Student']['id'] =  $user['Student']['id'];



        // バリデーション処理
        $this->User->set($data['User']);
        $this->Student->set($data['Student']);
        $user_validates = $this->User->validates(array('fieldList' => array('adress', 'phone')));
        $student_validates = $this->Student->validates(array('fieldList' => array('guarantor_name','guarantor_adress','guarantor_email')));
        if (!$user_validates || !$student_validates) {
            $this->Session->setFlash('Validation Error. Please Confirm Input Values', 'default', array('class' => 'alert alert-error'));
            $this->redirect(array('controller' => 'Student', 'action' => 'edit'));
        }

        // トランザクション処理始め
        $this->User->begin();
        $this->Student->begin();

        if (!$this->User->saveAll($data, array(
                false,
                'fieldList' => array(
                    'User' => array('id', 'adress', 'phone'),
                    'Student' => array('id','guarantor_name', 'guarantor_adress', 'guarantor_email'),
                )
            ))) {
            $this->User->rollback();
            $this->Student->rollback();
            throw new BadRequestException();
        }

        $this->User->commit();
        $this->Student->commit();
        // トランザクション処理終わり

        $this->Session->setFlash('You successfully edit your account.', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('controller' => 'Student', 'action' => 'show'));
    }

    /**
     * password
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function password()
    {

        if ($this->request->is('Post') && !empty($this->request->data['UserConfidential'])) {


            $data['UserConfidential']['old_password'] = $this->request->data['UserConfidential']['old_password'];
            $data['UserConfidential']['password'] = $this->request->data['UserConfidential']['password'];

            $user = $this->UserConfidential->findByUserId($this->me['User']['id']);

            if ($user['UserConfidential']['password'] !== $this->Auth->password($data['UserConfidential']['old_password'])) {
                // DBに保存されたパスワードと入力パスワードが不一致
                $this->Session->setFlash('現在のパスワードが一致しません', 'default', array('class' => 'alert alert-danger'));
                $this->redirect(array('controller' => 'Student', 'action' => 'password'));
            }

            //パスワードのハッシュ
            $data['UserConfidential']['password'] = AuthComponent::password($data['UserConfidential']['password']);

            // トランザクション処理始め
            $this->UserConfidential->begin();

            if (!$this->UserConfidential->save($data)) {
                $this->UserConfidential->rollback();
                throw new BadRequestException();
            }

            $this->UserConfidential->commit();
            // トランザクション処理終わり

            $this->Session->setFlash('You successfully chage your password.', 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('controller' => 'student', 'action' => 'password'));
        }
    }
}
