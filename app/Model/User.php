<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 */
class User extends AppModel {
    
/**
 * Display field
 *
 * @var string
 */
        
	public $displayField = 'username';
        
        public $validationDomain = 'validation';
        
        public $validate = array(
                'username' => array(
                    'required' => array(
                        'rule' => array('notEmpty'),
                        'message' => 'A username is required',
                        'rule' => array('isUnique'),
                        'message' => 'Username already taken'
                    )
                ),
                'password' => array(
                    'required' => array(
                        'rule' => array('notEmpty'),
                        'message' => 'A password is required'
                    )
                ),
                'email' => array (
                    'rule' => array('email', true),
                    'message' => 'Enter a valid email address',
                    'allowEmpty' => false
                ),
                'rank' => array(
                    'valid' => array(
                        'rule' => array('inList', array('admin', 'super-utilisateur', 'normal')),
                        'message' => 'Please enter a valide rank.',
                        'allowEmpty' => false
                    )
                )
            );
        
        
        /*public function __construct() {
            parent::__construct();
            $this->$validate = array(
                'username' => array(
                    'required' => array(
                        'rule' => array('notEmpty'),
                        'message' => __('A username is required', true)
                    )
                ),
                'password' => array(
                    'required' => array(
                        'rule' => array('notEmpty'),
                        'message' => __('A password is required', true)
                    )
                ),
                'rank' => array(
                    'valid' => array(
                        'rule' => array('inList', array('admin', 'super-utilisateur')),
                        'message' => __('Please enter a valide rank.', true),
                        'allowEmpty' => false
                    )
                )
            );
        }*/
        
        
        public function beforeSave($options = array()) {
            parent::beforeSave($options);
            
            if(isset($this->data[$this->alias]['password'])) {
                $passwordHasher = new SimplePasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
            }
            return true;
        }
                

}
