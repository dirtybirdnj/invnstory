<?php
App::uses('AppController', 'Controller');
/**
 * RequirementTypes Controller
 *
 * @property RequirementType $RequirementType
 */
class RequirementTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RequirementType->recursive = 0;
		$this->set('requirementTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RequirementType->exists($id)) {
			throw new NotFoundException(__('Invalid requirement type'));
		}
		$options = array('conditions' => array('RequirementType.' . $this->RequirementType->primaryKey => $id));
		$this->set('requirementType', $this->RequirementType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RequirementType->create();
			if ($this->RequirementType->save($this->request->data)) {
				$reponse['status'] = 'ok';
				$response['message'] = 'The requirement type has been saved';
			} else {
				$reponse['status'] = 'fail';
				$response['message'] = 'The requirement type could not be saved. Please, try again.';				
			}
			
		header('Content-Type: application/json');
		echo json_encode($response);			
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
		if (!$this->RequirementType->exists($id)) {
			throw new NotFoundException(__('Invalid requirement type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RequirementType->save($this->request->data)) {
				$this->Session->setFlash(__('The requirement type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The requirement type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RequirementType.' . $this->RequirementType->primaryKey => $id));
			$this->request->data = $this->RequirementType->find('first', $options);
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
		$this->RequirementType->id = $id;
		if (!$this->RequirementType->exists()) {
			throw new NotFoundException(__('Invalid requirement type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RequirementType->delete()) {
			$this->Session->setFlash(__('Requirement type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Requirement type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
