<?php
/**
 * TopController
 *
 * @author        Takanori Kobashi kobashi@akane.waseda.jp
 * @since         1.0.0
 * @version       1.0.0
 * @copyright
 */
App::uses('AppController', 'Controller');
class TopController extends AppController
{

    public $name = 'Top';
    public $helpers = array('Html', 'Form');
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
        if ($this->me['user_type'] == COMPLETION ) {
            $this->redirect(array('controller' => 'Completion', 'action' => 'index'));
        } else {
            $this->redirect(array('controller' => 'Student', 'action' => 'index'));
        }
    }

}
