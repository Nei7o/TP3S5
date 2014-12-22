<?php
App::uses('AppModel', 'Model');
/**
 * Mafia Model
 *
 * @property Family $Family
 */
class Mafia extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Family' => array(
			'className' => 'Family',
			'foreignKey' => 'mafia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
        
        
        
        public function isOwnedBy($post, $user) {
            return $this->field('id', array('id' => $post, 'id_user' => $user)) !== false;
        }

}
