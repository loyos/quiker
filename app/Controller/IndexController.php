<?php

App::uses('AppController', 'Controller');

class IndexController extends AppController {

	// public $uses = array();
	
	 public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','servicios','como_funciona');
    }

	public function index(){
		
	}
	
	public function servicios(){
		
	}
	
	public function como_funciona(){
		
	}	
}