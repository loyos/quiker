<?php
App::uses('AppModel', 'Model');

class Contacto extends AppModel {
    var $name = 'Contacto';
	
	public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Campo obligatorio.'
            ),
        ),
        'mensaje' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Campo obligatorio.'
            )
        ),
		'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Campo obligatorio.'
            )
        )
    );	
}

?>