<?php
App::uses('AppModel', 'Model');
/**
 * Member Model
 *
 * @property Family $Family
 * @property Rank $Rank
 */
class Member extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
        
        public $validate = array(
            'email' => array (
                    'rule' => array('email', true),
                    'message' => 'Enter a valid email address',
                    'allowEmpty' => false
                )
        );


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Family' => array(
			'className' => 'Family',
			'foreignKey' => 'family_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Skill' => array(
			'className' => 'Skill',
			'joinTable' => 'members_skills',
			'foreignKey' => 'member_id',
			'associationForeignKey' => 'skill_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
