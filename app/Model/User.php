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