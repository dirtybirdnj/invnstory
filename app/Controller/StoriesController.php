<?php
App::uses('AppController', 'Controller');
/**
 * Stories Controller
 *
 * @property Story $Story
 */
class StoriesController extends AppController {
	
	public $uses = array('Story','Character');

	public function beforeFilter(){
		
		$this->Auth->allow('home');
		
	}

	public function index() {
		$this->Story->recursive = 0;
		$this->set('stories', $this->paginate());
	}


	public function home(){
		
		$this->Story->unbindModel(array('hasMany' => array('Chapter')));
		$stories = $this->Story->find('all');
		$this->set('stories',$stories);
		
	}
	
	public function view($id = null) {
		if (!$this->Story->exists($id)) {
			throw new NotFoundException(__('Invalid story'));
		}
		$options = array('conditions' => array('Story.' . $this->Story->primaryKey => $id));
		$this->set('story', $this->Story->find('first', $options));
	}
	
	public function play($id){
		
		if (!$this->Story->exists($id)) {
			throw new NotFoundException(__('Invalid story'));
		}		
		
		$this->Story->recursive = 0;
		$story = $this->Story->read(null,$id);

		
		$user_id = $this->Session->read('Auth.User.id');
		
		$conditions = array('conditions' => array('Character.story_id' => $id,'Character.user_id' => $user_id));
		$this->Character->unbindModel(array('belongsTo' => array('User')));
		$chars = $this->Character->find('all',$conditions);	

		$this->set(compact('story','chars'));
		
	}

	public function init($id){
		
		$this->autoRender = false;
		
		$story = $this->Story->read(null,$id);
		
		debug($story);
		
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Story->create();
			if ($this->Story->save($this->request->data)) {
				$this->Session->setFlash(__('The story has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The story could not be saved. Please, try again.'));
			}
		}
		$users = $this->Story->User->find('list');
		$this->set(compact('users'));
	}

	public function edit($id = null) {
		if (!$this->Story->exists($id)) {
			throw new NotFoundException(__('Invalid story'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Story->save($this->request->data)) {
				$this->Session->setFlash(__('The story has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The story could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Story.' . $this->Story->primaryKey => $id));
			$this->request->data = $this->Story->find('first', $options);
		}
		$users = $this->Story->User->find('list');
		$this->set(compact('users'));
	}

	public function delete($id = null) {
		$this->Story->id = $id;
		if (!$this->Story->exists()) {
			throw new NotFoundException(__('Invalid story'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Story->delete()) {
			$this->Session->setFlash(__('Story deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Story was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
