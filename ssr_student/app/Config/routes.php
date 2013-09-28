<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */



    Router::connect('/login', array('controller' => 'User', 'action' => 'login'));
    Router::connect('/logout', array('controller' => 'User', 'action' => 'logout'));

    /* TopController */
    Router::connect('/', array('controller' => 'Top', 'action' => 'index'));

    Router::connect('/album/:id', array('controller' => 'Albums', 'action' => 'index'));
    Router::connect('/album/delete/:id', array('controller' => 'Albums', 'action' => 'delete'));
    Router::connect('/album/deactivate/:id', array('controller' => 'Albums', 'action' => 'deactivate'));
    Router::connect('/album/activate/:id', array('controller' => 'Albums', 'action' => 'activate'));

    Router::connect('/menter/:id', array('controller' => 'Menterings', 'action' => 'index'));
    Router::connect('/menter/all/:id', array('controller' => 'Menterings', 'action' => 'all'));
    Router::connect('/menter/request/:id', array('controller' => 'Menterings', 'action' => 'request'));
    Router::connect('/menter/request/allow/:id', array('controller' => 'Menterings', 'action' => 'request_allow'));
    Router::connect('/menter/friend/:id', array('controller' => 'Menterings', 'action' => 'friend'));
    Router::connect('/menter/friend/apply/:id', array('controller' => 'Menterings', 'action' => 'friend_apply'));
    Router::connect('/menter/remove/:id', array('controller' => 'Menterings', 'action' => 'remove'));


    Router::connect('/post/:id', array('controller' => 'Posts', 'action' => 'index'));
    Router::connect('/post/like/:id', array('controller' => 'Posts', 'action' => 'like'));
    Router::connect('/post/delete/:id', array('controller' => 'Posts', 'action' => 'delete'));
    Router::connect('/post/mentee/:id', array('controller' => 'Posts', 'action' => 'mentee'));

    // Router::connect('/request/:id', array('controller' => 'Requests', 'action' => 'index'));
    // Router::connect('/request/apply/:id', array('controller' => 'Requests', 'action' => 'apply'));

    Router::connect('/uploads/user_thumbnail', array('controller' => 'Uploads', 'action' => 'user_thumbnail'));

    Router::connect('/category', array('controller' => 'Categories', 'action' => 'index'));
    Router::connect('/category/album/:id', array('controller' => 'Categories', 'action' => 'album'));

    Router::connect('/mypage/:id', array('controller' => 'Mypage', 'action' => 'index'));




/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
    CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
    require CAKE . 'Config' . DS . 'routes.php';
