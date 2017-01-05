<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash', 'RequestHandler');
	
	public $paginate = array (
		'limit' => 5,
		'order' => array (
			'User.id' => 'asc'
		)
	);

	public function beforeFilter()
	{
		parent::beforeFilter();
		
	}

	public function isAuthorized ( $user )
	{
		if ( $user['role'] == 'user' )
		{
			if ( in_array ( $this -> action, array ( 'index', 'view' ) ) )
			{
				return true;
			}
			else 
			{
				if ( $this -> Auth -> user ( 'id' ) )
				{
					$this -> Session -> setFlash ( 'No Puede acceder', 'default', array('class' => 'alert alert-danger') );
					$this -> redirect( $this -> Auth -> redirect() );
				}
			}
		}

		return parent::isAuthorized($user);
	}
	
	public function login()
	{
		if($this->request->is('post'))
		{
			if($this->Auth->login())
			{
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash('Usuario y/o contraseña son incorrectos!', 'default', array('class' => 'alert alert-danger'));
		}
	}
	
	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this -> User -> recursive = 0;
		$this -> paginate['User']['limit'] = 5;
		$this -> paginate['User']['order'] = array (
			'User.id' => 'asc'
		); 
		//$this -> paginate['Moto']['conditions'] = array ( 'Mesero.id' => '')
		
		$this -> set ( 'users', $this -> paginate() );
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
			throw new NotFoundException(__('Usuario Invalido'));
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
				
				$this->Session->setFlash('El Usuario fue guardado.', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				
				$this->Session->setFlash('El Usuario no pudo ser guardado.', 'default', array('class' => 'alert alert-danger'));
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
			throw new NotFoundException(__('Usuario Invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('El Usuario fue modificado', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El usuario no pudo ser modificado.', 'default', array('class' => 'alert alert-danger'));
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
			throw new NotFoundException(__('Usuario Invalido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash('El Usuario fue eliminado', 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash('El usuario no pudo ser eliminado.', 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
