<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Pedido extends AppModel {
    var $name = 'Pedido';
	
	public $actsAs = array(
        'Search.Searchable'
    );
	
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'numero_quiker'
        )
    );
	
	public $filterArgs = array(
        'status' => array(
            'type' => 'like',
            'field' => 'status'
        ),
		'quiker' => array(
            'type' => 'query',
            'method' => 'orConditions'
        ),
		'nombre' => array(
            'type' => 'like',
            'field' => 'User.name'
        )
    );
	
	public function orConditions($data = array()) {
        $filter = $data['quiker'];
        $condition = array(
                $this->alias . '.numero_quiker' => $filter ,
        );
		debug($condition);
        return $condition;
    }

	public $validate = array(
        'status' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'rellena este campo'
            ),
        ),
        'peso' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'rellena este campo'
            )
        ),
		'descripcion' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'rellena este campo'
            )
        ),
		'numero_quiker' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'rellena este campo'
            )
        ),
		'precio' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'rellena este campo'
            )
        )
    );	
}

?>