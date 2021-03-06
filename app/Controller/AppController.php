<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
        'Session',
		'DebugKit.Toolbar',
        'Auth' => array(
			'authorize' => 'Controller',
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'index',
				'admin' => false
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
				'admin' => false
            ),
            'authenticate' => array(
				'all' => array  (
					'scope' => array ('User.active' => 1)
				),
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('view'); // always permitted
		$logged = $this->Auth->loggedIn();
		if($logged){
			$username = $this->Auth->user('username');
			$this->set('username', $username);
		}
		$this->set('logged', $logged);
		// debug($this->Session->read('Auth'));
		// debug($this->Auth->());
    }
	
	public function isAuthorized($user = null) {
		// debug($user);
		// debug($this->request->params['admin']);
		 if (empty($this->request->params['admin']) && $user['rol'] != 'admin') {
            return true;
        }
		
		if (isset($this->request->params['admin'])) {
            return (bool)($user['rol'] === 'admin');
        }
		
		return false;
    }

}
