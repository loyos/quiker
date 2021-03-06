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
        ),
		'name' => array(
            'type' => 'like',
            'method' => 'name'
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
            ),
			'required' => array(
				'rule' => array('unique_username'),
				'message' => 'Nombre de usuario ya ocupado'
			),
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
		'email' => array(
            'required' => array(
                'rule' => array('unique_email'),
                'message' => 'Este email ya esta en uso.'
            )
        )
    );
	
	public function unique_username($username){
		// debug($username);
		$username = $username['username'];
		$check = $this->find('all', array(
			'conditions' => array(
				'username' => $username
			)
		));
		
		if(!empty($check)){
			return false;
		}else{
			return true;
		}
	}
	
	public function unique_email($email){
		// debug($username);
		$email = $email['email'];
		$check = $this->find('all', array(
			'conditions' => array(
				'email' => $email
			)
		));
		
		if(!empty($check)){
			return false;
		}else{
			return true;
		}
	}
	
	public function getNumber(){
		$source = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ12345678901234567890';
        $rstr = "";
        $source = str_split($source,1);
        for($i=0; $i<=15; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
		 return $rstr;
    }
	
}

?>