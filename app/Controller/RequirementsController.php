<?php
App::uses('AppController', 'Controller');
/**
 * Requirements Controller
 *
 * @property Requirement $Requirement
 */
class RequirementsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Requirement->recursive = 0;
		$this->set('requirements', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Requirement->exists($id)) {
			throw new NotFoundException(__('Invalid requirement'));
		}
		$options = array('conditions' => array('Requirement.' . $this->Requirement->primaryKey => $id));
		$this->set('requirement', $this->Requirement->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->autoRender = false;
		
		if ($this->request->is('post')) {
		
		
			//debug($this->request->data);
			//die();
		
			$this->Requirement->create();
			if ($this->Requirement->save($this->request->data)) {

				$response['id'] = $this->Requirement->id;
				header('Content-Type: application/json');
				echo json_encode($response);

			} else {
				
				//debug($this->Requirement->validationErrors);
				
			}
		}
		//$paths = $this->Requirement->Path->find('list');
		//$requirementTypes = $this->Requirement->RequirementType->find('list');
		//$this->set(compact('paths', 'requirementTypes'));
	}

	public function delete($id = null) {

		$this->autoRender = false;
		$this->Requirement->id = $id;
		if (!$this->Requirement->exists()) {
			throw new NotFoundException(__('Invalid requirement'));
		}
		$this->request->onlyAllow('post', 'delete');

		if ($this->Requirement->delete()){ $response['status'] = 'ok'; } 
		else { $response['status'] = 'fail'; }
		
		header('Content-Type: application/json');
		echo json_encode($response);		

	}
}
