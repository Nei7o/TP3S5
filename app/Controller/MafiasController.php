<?php
App::uses('AppController', 'Controller');
/**
 * Mafias Controller
 *
 * @property Mafia $Mafia
 * @property PaginatorComponent $Paginator
 */
class MafiasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Mafia->recursive = 0;
		$this->set('mafias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mafia->exists($id)) {
			throw new NotFoundException(__('Invalid mafia'));
		}
		$options = array('conditions' => array('Mafia.' . $this->Mafia->primaryKey => $id));
		$this->set('mafia', $this->Mafia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    $this->request->data['Mafia']['id_user'] = $this->Auth->user('id');
			$this->Mafia->create();
			if ($this->Mafia->save($this->request->data)) {
				$this->Session->setFlash(__('The mafia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mafia could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Mafia->exists($id)) {
			throw new NotFoundException(__('Invalid mafia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mafia->save($this->request->data)) {
				$this->Session->setFlash(__('The mafia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mafia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Mafia.' . $this->Mafia->primaryKey => $id));
			$this->request->data = $this->Mafia->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Mafia->id = $id;
		if (!$this->Mafia->exists()) {
			throw new NotFoundException(__('Invalid mafia'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Mafia->delete()) {
			$this->Session->setFlash(__('The mafia has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mafia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function isAuthorized($user) {
            if ($this->action === 'add') {
                return true;
            }
            
            if (in_array($this->action, array('edit', 'delete'))) {
                $postId = (int) $this->request->params['pass'][0];
                if($this->Mafia->isOwnedBy($postId, $user['id'])) {
                    return true;
                }
            }
            
            return parent::isAuthorized($user);
        }
}
