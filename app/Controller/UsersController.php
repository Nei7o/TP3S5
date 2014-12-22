<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('add', 'logout');
        }
        
        public function login() {
            if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                    return $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash(__("Invalid username or password."));
                }
            }
        }
        
        public function logout() {
            return $this->redirect($this->Auth->logout());
        }
        
        public function send_mail($userId = null, $receiver = null, $name = null) {
            $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/validatemyaccount/" . $userId;
            $message = 'Hi,' . $name . ', please click the link below to accivate your account. Until it\'s done, you will have a limited access to our website.';
            App::uses('CakeEmail', 'Network/Email');
            $email = new CakeEmail('gmail');
            $email->from('mafia.organised.crime@gmail.com');
            $email->to($receiver);
            $email->subject('Mafia Organised Crime - Mail Confirmation');
            $email->send($message . "\n\n" . $confirmation_link);
        }
        
        public function send_mail_auth() {
            $this->send_mail(AuthComponent::user('id'), AuthComponent::user('email'), AuthComponent::user('username'));
        }
        
        public function validateMyAccount($id) {
            $this->User->updateAll(array('User.rank' => "'super-utilisateur'"), array('User.id' => $id));
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    
 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
                                $email = $this->request->data('User.email');
                                $username = $this->request->data('User.username');
                                $this->send_mail($this->User->id, $email, $username);
				return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function isAuthorized($user) {
            /*if ($this->action == 'validateMyAccount') {
                return true;
            }*/
            
            if (in_array($this->action, array('edit', 'delete'))) {
                $userId = (int) $this->request->params['pass'][0];
                if($userId == $user['id']) {
                    return true;
                }
            }
            
            return parent::isAuthorized($user);
        }
}
