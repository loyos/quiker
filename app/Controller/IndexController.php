<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {

	// public $uses = array();
	
	 public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

	public function index(){
		
	}
	
}
