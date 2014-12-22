<?php
App::uses('AppModel', 'Model');
/**
 * Family Model
 *
 * @property Mafia $Mafia
 * @property Member $Member
 */
class Family extends AppModel {
    
    public $validate = array(
        'logo_file' => array(
            'extensionRule' => array(
                'rule' => array('extension', array('jpg', 'jpeg', 'png', 'gif')),
                'message' => 'The file format is invalide. Use jpg, png or gif file.'
            ),
            
            'sizeRule' => array(
                'rule' => array('fileSize', '<=', '1MB'),
                'message' => 'The file is too big. 1MB maximum.'
            )
        )
    );
            
    /*public function fileExtension ($check, $extensions) {
        $file = current($check);
        $maxFileSize = 1024;
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $filesize = $this->request->data['Family']['logo_file']['size'];
                        
        if (!empty($this->request->data['Famnily']['logo_file']['tmp_name'])
                && in_array($extension, $extensions)
                && $filesize <= $maxFileSize) {
                            
            move_uploaded_file($this->request->data['Family']['logo_file']['tmp_name'], IMAGES . 'logos' . DS . $this->Family->id . '.' . $fileextention);
        }
    }*/
    
    public function afterSave($created, $options = array()) {
        parent::afterSave($created, $options);
        
        if (isset($this->data[$this->alias]['logo_file'])) {
            $file = $this->data[$this->alias]['logo_file'];
            $extention = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $logo = $this->id . '.' . $extention;
            $oldLogo = IMAGES . 'logos' . DS . $this->field('logo');
            
            if (file_exists($oldLogo)) {
                unlink($oldLogo);
            }
            
            if (!empty($file['tmp_name'])) {
                move_uploaded_file($file['tmp_name'], IMAGES . 'logos' . DS . $logo);
                $this->saveField('logo', $logo);
            }
        }
                
    }
    
    public function getActivitiesNames($term = null) {
        if(!empty($term)) {
            $activities = $this->find('list', array(
                'condition' => array(
                    'criminal_activities LIKE' => trim($term) . '%'
                )
            ));
            return $activities;
        }
        return false;
    }

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Mafia' => array(
			'className' => 'Mafia',
			'foreignKey' => 'mafia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Member' => array(
			'className' => 'Member',
			'foreignKey' => 'family_id',
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
        
        public $hasOne = array(
            'State' => array(
                'classname' => 'State',
                'foreignKey' => '',
                'dependent' => false
            )
        );

}
