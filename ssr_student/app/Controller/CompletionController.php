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
class CompletionController extends AppController
{

    public $name = 'Completion';
    public $uses = array('User','Student','Completion','GraduationCourse','UserConfidential','Certification');
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

        if ($this->me['user_type'] !== COMPLETION ) {
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
        $user = $this->User->getCompletionUser($this->me['User']['id']);
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
        if (!$this->request->is('Post') || empty($this->request->data['User']) || empty($this->request->data['Completion'] )) {
            // POST値なし。
            $this->request->data = $this->User->getCompletionUser($this->me['User']['id']);
            unset($this->request->data['User']['id']);
            return;
        }

        $user = $this->User->getCompletionUser($this->me['User']['id']);

        $data = array();
        $data = $this->request->data;
        $data['User']['id'] =  $this->me['User']['id'];
        $data['Student']['id'] =  $user['Student']['id'];
        $data['Completion']['id'] =  $user['Completion']['id'];
        $data['Completion']['is_modified'] =  true;
        $data['GraduationCourse'] =  $this->request->data['Completion']['GraduationCourse'];
        $data['GraduationCourse']['id'] =  $user['Completion']['GraduationCourse']['id'];

        // バリデーション処理
        $this->User->set($data['User']);
        $this->Student->set($data['Student']);
        $this->GraduationCourse->set($data['GraduationCourse']);

        $user_validates = $this->User->validates(array('fieldList' => array('adress', 'phone')));
        $student_validates = $this->Student->validates(array('fieldList' => array('guarantor_name','guarantor_adress','guarantor_email')));
        $graduation_course_validates = $this->GraduationCourse->validates(array('fieldList' => array('business_type','department','role')));


        if (!$user_validates || !$student_validates || !$graduation_course_validates) {
            $this->Session->setFlash('Validation Error. Please Confirm Input Values', 'default', array('class' => 'alert alert-error'));
            $this->redirect(array('controller' => 'Completion', 'action' => 'edit'));
        }

        // トランザクション処理始め
        $this->User->begin();
        $this->Student->begin();
        $this->Completion->begin();
        $this->GraduationCourse->begin();

        if (!$this->User->saveAll($data, array(
                false,
                'fieldList' => array(
                    'User' => array('id', 'adress', 'phone'),
                    'Student' => array('id','guarantor_name', 'guarantor_adress', 'guarantor_email'),
                    'Completion' => array('id','is_modified'),
                )
            ))) {
            $this->User->rollback();
            $this->Student->rollback();
            $this->Completion->rollback();
            $this->GraduationCourse->rollback();
            throw new BadRequestException();
        }

        if (! $this->GraduationCourse->save($data['GraduationCourse'], false, array('id', 'business_type', 'department', 'role'))) {
            $this->User->rollback();
            $this->Student->rollback();
            $this->Completion->rollback();
            $this->GraduationCourse->rollback();
            throw new InternalErrorException();
        }

        $this->User->commit();
        $this->Student->commit();
        $this->Completion->commit();
        $this->GraduationCourse->commit();
        // トランザクション処理終わり

        $this->Session->setFlash('You successfully edit your account.', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('controller' => 'Completion', 'action' => 'show'));
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
                $this->redirect(array('controller' => 'Completion', 'action' => 'password'));
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
            $this->redirect(array('controller' => 'Completion', 'action' => 'password'));
        }
    }

    /**
     * create_certification
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function create_certification()
    {
        if ($this->request->is('Post') && !empty($this->request->data['Certification'])) {

            $data['Certification'] = $this->request->data['Certification'];
            $data['Certification']['user_id'] = $this->me['User']['id'];

            // バリデーション処理
            $this->Certification->set($data['Certification']);
            $validates = $this->Certification->validates();

            if (!$validates) {
                $this->Session->setFlash('Validation Error. Please Confirm Input Values', 'default', array('class' => 'alert alert-error'));
                $this->redirect(array('controller' => 'Completion', 'action' => 'create_certification'));
            }

             // トランザクション処理始め
            $this->Certification->begin();

            if (!$this->Certification->save($data)) {
                $this->Certification->rollback();
                throw new BadRequestException();
            }

            $this->Certification->commit();
            // トランザクション処理終わり

            $this->Session->setFlash('大学に証明書発行依頼をだしました', 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('controller' => 'Completion', 'action' => 'create_certification'));
        }
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
}
