<?php

App::uses('AppController', 'Controller');

class PedidosController extends AppController {
	
	public $uses = array();
	
	public function beforeFilter() {
        parent::beforeFilter();
        // $this->Auth->allow('add');
    }

    public function index() {
        $this->Pedido->recursive = 0;
		// $pedidos_info = $this->Pedido->findByNumeroQuiker($this->Auth->user('id'));
		$pedidos_info = $this->Pedido->find('all', array(
			'conditions' => array(
				'numero_quiker' => $this->Auth->user('id')
			)
		));
		$this->set('pedidos_info', $pedidos_info);
    }
	
	public function admin_index(){
		$pedidos_info = $this->Pedido->find('all');
		$this->set('pedidos_info', $pedidos_info);
	}
	
	public function admin_edit($id = null){
		
		if(!empty($id)){
			if (!empty($this->request->data)){
				$this->Pedido->id = $id;
				if ($this->Pedido->save($this->request->data)) {
					$this->Session->setFlash(__('El Pedido ha sido guardado'));
					return $this->redirect(array('action' => 'admin_index'));
				}
			}else{
				$this->request->data =  $this->Pedido->findById($id);
			}
		}else{
			if ($this->request->is('post')) {
				$this->Pedido->create();
				if ($this->Pedido->save($this->request->data)) {
					$this->Session->setFlash(__('El Pedido ha sido guardado'));
					return $this->redirect(array('action' => 'admin_index'));
				}
			}else{
				// do nothing
			}
		}	
	}
	
	public function admin_view(){
		$pedidos_info = $this->Pedido->find('all');
		$this->set('pedidos_info', $pedidos_info);
	}
}
