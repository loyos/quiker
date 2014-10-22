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
        $this->Auth->allow('add','active_account','contacto','forgot_password','reset_password');
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
	
	public function admin_delete($id) {
	    $this->User->deleteAll(array('User.id' => $id));
		$this->Session->setFlash(
			__('Usuario Eliminado.')
		);
		return $this->redirect(array('action' => 'index'));
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
						->from('quikerwireenvios@gmail.com')
						->send();
					
					// email sent
					
				
                $this->Session->setFlash(__('Has sido registrado con exito, revisa tu email y sigue los pasos para validar tu cuenta'));
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
			$this->Session->setFlash(__('El usuario ha sido activado'));
			
			$Email = new CakeEmail();
				$Email->viewVars(array('nombre' => $user['User']['nombre']));
				$Email->viewVars(array('id' => $user['User']['id']));
					
					// sending email
					
						$Email->template('bienvenida', null)
						->emailFormat('html')
						->to($user['User']['email'])
						->from('contacto@quikerwire.com')
						->send();
					
					// email sent
		} else {
			$this->Session->setFlash(__('Link incorrecto'));
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
	
	public function admin_edit($id = null) {
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
	
	public function contacto() {
		$this->loadModel('Contacto');
        if ($this->request->is('post')) {
            if ($this->Contacto->save($this->request->data)) {
				
				$Email = new CakeEmail();
				$Email->viewVars(array('nombre' => $this->request->data['Contacto']['nombre']));
				$Email->viewVars(array('email' => $this->request->data['Contacto']['email']));
				$Email->viewVars(array('telefono' => $this->request->data['Contacto']['telefono']));
				$Email->viewVars(array('mensaje' => $this->request->data['Contacto']['mensaje']));
				$Email->viewVars(array('direccion' => $this->request->data['Contacto']['direccion']));
					
					// sending email
					
						$Email->template('contacto', null)
						->emailFormat('html')
						->to('quikerwireenvios@gmail.com')
						->from('contacto@quikerwire.com')
						->send();
					
					// email sent
				
                $this->Session->setFlash(__('Hemos recibido tu mensaje, te contestaremos lo antes posible!'));
                return $this->redirect(array('controller' => 'index', 'action' => 'index'));
            }
		}
    }
	
	function forgot_password(){
		if (!empty($this->data)) {
			//Send the email 
			$email = $this->data['User']['email'];
			$user = $this->User->find('first',array(
				'conditions' => array('User.email' => $email)
			));
			if (!empty($user)) {
				if (!empty($user['User']['name']) && !empty($user['User']['lastname'])) {
					$name = $user['User']['name'].' '.$user['User']['lastname'];
				} else {
					$name = $user['User']['username'];
				}
				$id = $user['User']['id'];
				$key = $this->User->getNumber();
				$update = array('User' => array(
					'id' => $id,
					'key' => $key
				));
				$this->User->save($update);
				$Email = new CakeEmail();
				$Email->from('contacto@quikerwire.com');
				$Email->emailFormat('html');
				$Email->to($email);
				$Email->subject(__('QuikerWire: Reseteo de password'));
				$Email->template('reset_password', null);
				$Email->viewVars(compact('id','key','name'));
				$Email->send();
				$this->Session->setFlash(__("Recibirás un correo con instrucciones")); 
				$this->redirect(array('controller' => 'index', 'action'=>'index'));
			} else {
				$this->Session->setFlash(__("Invalid email")); 
			}
		}
	}
	
	function reset_password ($id,$key) {
		if (!empty($this->data)) {
			$data = $this->data;
			$data['User']['key'] = '';
			if ($this->User->save($data)) {
						
				$this->Session->setFlash(__("La contraseña ha sido cambiada")); 
				$this->redirect(array('controller' => 'users', 'action'=>'login'));
			}
		}else {
			$user = $this->User->find('first',array(
				'conditions' => array(
					'User.id' => $id,
					'User.key' => $key
				)
			));
			if (!empty($user)) {
				$this->set(compact('id'));
			} else {
				$this->Session->setFlash(__("Link Inválido")); 
				$this->redirect(array('controller' => 'index', 'action'=>'index'));
			}
		}
		$this->set(compact('id'));
	}
}