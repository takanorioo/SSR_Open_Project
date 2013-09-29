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



    Router::connect('/login', array('controller' => 'Administrator', 'action' => 'login'));
    Router::connect('/logout', array('controller' => 'Administrator', 'action' => 'logout'));

    /* TopController */
    Router::connect('/', array('controller' => 'Top', 'action' => 'index'));

    /* TopController */
    Router::connect('/completion/event', array('controller' => 'Event', 'action' => 'index'));
    Router::connect('/completion/event/show/:id', array('controller' => 'Event', 'action' => 'show'));
    Router::connect('/completion/event/add', array('controller' => 'Event', 'action' => 'add'));
    Router::connect('/completion/event/delete/:id', array('controller' => 'Event', 'action' => 'delete'));


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
