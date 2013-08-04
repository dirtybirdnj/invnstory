<?php
App::uses('AppController', 'Controller');
/**
 * Stats Controller
 *
 * @property Stat $Stat
 */
class StatsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    
	public function index() {
		$this->Stat->recursive = 0;
		$this->set('stats', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Stat->exists($id)) {
			throw new NotFoundException(__('Invalid stat'));
		}
		$options = array('conditions' => array('Stat.' . $this->Stat->primaryKey => $id));
		$this->set('stat', $this->Stat->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Stat->create();
			if ($this->Stat->save($this->request->data)) {
				$this->Session->setFlash(__('The stat has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stat could not be saved. Please, try again.'));
			}
		}
		$users = $this->Stat->User->find('list');
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
		if (!$this->Stat->exists($id)) {
			throw new NotFoundException(__('Invalid stat'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Stat->save($this->request->data)) {
				$this->Session->setFlash(__('The stat has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stat could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Stat.' . $this->Stat->primaryKey => $id));
			$this->request->data = $this->Stat->find('first', $options);
		}
		$users = $this->Stat->User->find('list');
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
		$this->Stat->id = $id;
		if (!$this->Stat->exists()) {
			throw new NotFoundException(__('Invalid stat'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Stat->delete()) {
			$this->Session->setFlash(__('Stat deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Stat was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
