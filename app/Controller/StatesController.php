<?php
App::uses('AppController', 'Controller');
/**
 * States Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class StatesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        
        public function getByCountry() {
            $country_id = $this->request->data['Family']['country_id'];
            $states = $this->State->find('list', array(
                'conditions' => array('State.country_id' => $country_id),
                'recursive' => -1
            ));
            
            $this->set('states', $states);
            $this->layout = 'ajax';
        }

}
