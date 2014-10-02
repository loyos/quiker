<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {
	
	public $uses = array();
	
	public $components = array(
        'Search.Prg', 'Paginator'
    );
	
	 public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','active_account');
    }

    public function index() {
        $this->User->recursive = 0;
		$user_info = $this->User->findById($this->Auth->user('id'));
        // $this->set('users', $this->paginate());
		// debug($this->paginate());
		// debug($this->Auth->user('id'));
		// $users = $this->User->find('all');
		$this->set('user_info', $user_info);
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if($this->Auth->user('rol') == 'admin'){
					return $this->redirect(array('controller' => 'pedidos', 'action' => 'index', 'admin' => true));
				}
				return $this->redirect(array('controller' => 'users', 'action' => 'index', 'admin' => false));
			}
			$this->Session->setFlash(__('Error de autenticación, usuario o contraseña incorrecta, usuario podría estar inactivo'));
		}
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function admin_logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function admin_index(){
		$this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->User->parseCriteria($this->Prg->parsedParams());
        $this->set('users', $this->Paginator->paginate());
		// $users = $this->User->find('all');
		// $this->set('users', $users);
	}
	
	public function admin_view($id = null){
		$user = $this->User->findById($id);
		$this->set('user', $user);
	}
	
	public function admin_add() {
	    if ($this->request->is('post')) {
            $this->User->create();
			$this->request->data['active'] = 1;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function add() {
	
        if ($this->request->is('post')) {
            $this->User->create();
			$this->request->data['User']['active']= 0;
			$key = $this->User->getNumber();
			$this->request->data['User']['key'] = $key;
            if ($this->User->save($this->request->data)) {
				$Email = new CakeEmail();
				$Email->viewVars(array('username' => $this->request->data['User']['username']));
				$Email->viewVars(array('key' => $this->request->data['User']['key']));
					
					// sending email
					
						$Email->template('add', null)
						->emailFormat('html')
						->to($this->request->data['User']['email'])
						->from('app@domain.com')
						->send();
					
					// email sent
					
				
                $this->Session->setFlash(__('Has sido registrado con exito, revisa tu email y sigue los pasos para validar tu cuenta'), 'success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('Error al crear el usuario. Por favor corrige los errores')
            );
			// return $this->redirect(array('action' => 'index'));
        }
    }
	
	public function active_account($username,$key) {
		$user = $this->User->find('first',array(
			'conditions' => array(
				'User.username' => $username,
				'User.key' => $key
			)
		));
		if (!empty($user)) {
			$active_user = array('User'=>array(
				'active' => 1,
				'id' => $user['User']['id'],
				'key' => ''
			));
			$this->User->save($active_user);
			$this->Session->setFlash(__('Your user has been activated'));
		} else {
			$this->Session->setFlash(__('Incorrect link'));
		}
		$this->redirect(array('controller' => 'users', 'action'=>'login'));
	}
	

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
			    return $this->redirect(array('action' => 'index'));
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
