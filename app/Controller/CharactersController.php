<?php
App::uses('AppController', 'Controller');
/**
 * Characters Controller
 *
 * @property Character $Character
 */
class CharactersController extends AppController {

	public function index() {
		$this->Character->recursive = 0;
		$this->set('characters', $this->paginate());
	}

	public function view($id = null) {
		if (!$this->Character->exists($id)) {
			throw new NotFoundException(__('Invalid character'));
		}
		$options = array('conditions' => array('Character.' . $this->Character->primaryKey => $id));
		$this->set('character', $this->Character->find('first', $options));
	}

	public function create(){

		$this->autoRender = false;
		
		if ($this->request->is('post')) {
		
			if ($this->Character->save($this->request->data)) {
				$response['status'] = 'ok';
				$response['message'] = 'The character has been saved';
			} else {
				$response['status'] = 'fail';
				$response['message'] = 'Something went wrong!';			
			}		

		header('Content-Type: application/json');
		echo json_encode($response);
		
		}
		
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Character->create();
			if ($this->Character->save($this->request->data)) {
				$this->Session->setFlash(__('The character has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The character could not be saved. Please, try again.'));
			}
		}
		$users = $this->Character->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Character->exists($id)) {
			throw new NotFoundException(__('Invalid character'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Character->save($this->request->data)) {
				$this->Session->setFlash(__('The character has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The character could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Character.' . $this->Character->primaryKey => $id));
			$this->request->data = $this->Character->find('first', $options);
		}
		$users = $this->Character->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Character->id = $id;
		if (!$this->Character->exists()) {
			throw new NotFoundException(__('Invalid character'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Character->delete()) {
			$this->Session->setFlash(__('Character deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Character was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
