<?php
/**
 * UserController
 *
 * @author        Takanori Kobashi kobashi@akane.waseda.jp
 * @since         1.0.0
 * @version       1.0.0
 * @copyright
 */
App::uses('AppController', 'Controller');
class UserController extends AppController
{

    public $name = 'User';
    public $uses = array('User','UserConfidential');
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
        $this->Auth->allow(); //認証なしで入れるページ
    }

    /**
     * login
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function login()
    {
        //既にログイン済みならリダイレクト先へ飛ばす
        if ($this->me['is_login']) {
            $this->redirect($this->Auth->redirect());
        } else {
            //未だログインしていなかったらフォーム入力値を見てログイン成功／失敗の振り分け
            if (!empty($this->request->data)) {
                if ($this->Auth->login()) {

                    $this->redirect($this->Auth->redirect());
                } else {
                    if (isset($this->request->data['UserConfidential']['email']) && isset($this->request->data['UserConfidential']['password'])) {
                        $this->UserConfidential->invalidate('login', 'メールアドレスとパスワードの組み合わせが間違っています。');
                    }
                }
            }
        }
    }

    /**
     * logout
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    public function logout()
    {
        if ($this->me['is_login']) {
            $this->Auth->logout();
            $this->redirect($this->Auth->redirect());
        }
        $this->redirect('/');
    }
}
