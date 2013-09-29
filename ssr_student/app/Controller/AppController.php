<?php
/**
 * AppController
 *
 * @author        Takanori Kobashi kobashi@akane.waseda.jp
 * @since         1.0.0
 * @version       1.0.0
 * @copyright
 */
App::uses('Controller', 'Controller');
class AppController extends Controller
{

   public $components = array(
        'DebugKit.Toolbar',
        'Auth' => array(
            'loginAction' => array(
                'controller' => '/',
                'action' => 'login',
            ),
            'authError' => '認証に失敗しました',
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'UserConfidential',
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password'
                    ),
                    'scope' => array('delete' => '0')
                )
            )
        ),
        'Cookie',
        'Session',
        'Basic'
    );

    public $me = array();
    public $facebook;
    public $uses = array(
        'Completion',
        'User',
    );
    public $absolute_path_with_protocols;
    public $base_dir;

    /**
     * beforeFilter
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    function beforeFilter()
    {
        App::uses('Sanitize', 'Utility');

        /*ユーザー情報埋め込み*/
        $this->me = $this->_getMe();
        $this->set('me', $this->me);

        /*基本共通変数*/
        $this->base_dir = $this->_getBaseDir();
        $this->set('base_dir', $this->base_dir);

        // 定数の取得
        require_once(APP . 'Config' . DS . 'constants.php');

        //もしもPOSTだった場合はトークンが正規のものか確認
        if ($this->request->is('post') && !($this->request->action === 'loginCallback' && $this->request->controller === 'users')) {
            if (!array_key_exists('token', $this->request->data)) {
                throw new BadRequestException();
                //echo "POSTを送信する際はトークンも一緒にhiddenパラメタで送って下さい。name=token, value=session_id()を指定して下さい。";

           }
            if (!$this->Basic->isValidToken($this->request->data['token'])) {
                throw new BadRequestException();
                //echo "POSTを送信する際はトークンも一緒にhiddenパラメタで送って下さい。name=token, value=session_id()を指定して下さい。";
            }
        }

    }

    /**
     * beforeRender
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    function beforeRender()
    {
        // エラー時に行う特別処理
        if($this->viewPath == 'Errors'){
            $this->layout = 'error';
            $this->set('title_for_layout', '指定されたページは存在しません');
            $this->set('base_dir', $this->_getBaseDir());

        }
    }

    /**
     * _getMe
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    private function _getMe()
    {
        //ログインした人のuser_typeを調べる
        $completion = $this->Completion->findByUserId($this->Auth->user('user_id'));
        if(!empty($completion)) {
            $user_type = COMPLETION;
        } else {
            $user_type = STUDENT;
        }

        $user = $this->User->findById($this->Auth->user('user_id'));

        return array(
            'is_login' => $this->Auth->loggedIn(),
            'token' => session_id(),
            'user_type' => $user_type,
            'User' => $user['User'],
            'UserDetail' => $this->Auth->user()
        );
    }

    /**
     * _getBaseDir
     * @param:
     * @author: T.Kobashi
     * @since: 1.0.0
     */
    private function _getBaseDir()
    {
        $paths = Router::getPaths();
        return  str_replace('/', '', $paths['base']);
    }
}
