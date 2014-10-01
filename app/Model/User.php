<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    var $name = 'User';
	
	public $actsAs = array(
        'Search.Searchable'
    );
	
	public $filterArgs = array(
        'username' => array(
            'type' => 'like',
            'field' => 'username'
        ),
		'quiker' => array(
            'type' => 'query',
            'method' => 'orConditions'
        )
    );
	
	public function orConditions($data = array()) {
        $filter = $data['quiker'];
        $condition = array(
                $this->alias . '.id' => $filter ,
        );
        return $condition;
    }
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
	public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        )
    );
	
}

?>