<?php
App::uses('AppController', 'Controller');

class PathsController extends AppController {

	public $uses = array('Path','Chapter','Story','Event','RequirementType','Item');

	public function index() {
		$this->Path->recursive = 0;
		$this->set('paths', $this->paginate());
	}

	public function view($id = null) {
		if (!$this->Path->exists($id)) {
			throw new NotFoundException(__('Invalid path'));
		}

		$options = array('conditions' => array('Path.' . $this->Path->primaryKey => $id));
		$path = $this->Path->find('first', $options);
		$requirement_types = $this->RequirementType->find('list');
		$this->set(compact('path','requirement_types'));		
		
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Path->create();
			if ($this->Path->save($this->request->data)) {
				$this->Session->setFlash(__('The path has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The path could not be saved. Please, try again.'));
			}
		}
		$chapters = $this->Chapter->find('list');
		$stories = $this->Story->find('list');				
		$events = $this->Path->Event->find('list');
		$this->set(compact('events','chapters','stories'));	
	}

	public function edit($id = null) {
		if (!$this->Path->exists($id)) {
			throw new NotFoundException(__('Invalid path'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Path->save($this->request->data)) {
				$this->Session->setFlash(__('The path has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The path could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Path.' . $this->Path->primaryKey => $id));
			$path = $this->request->data = $this->Path->find('first', $options);	
		}
		
		
		//debug($path['Path']);
		$chapter_id = $path['Path']['chapter_id'];
		
		$chapters = $this->Chapter->find('list');
		$stories = $this->Story->find('list');
		
		$conditions = array('conditions' => array('Event.chapter_id' => $chapter_id));
			
		//$this->Event->recursive = 0;
		$this->Event->unbindModel(array('belongsTo' => array('Chapter')));		
		$events = $this->Event->find('all',$conditions);
		
		$requirement_types = $this->RequirementType->find('list');
		
		debug($requirement_types);
		
		$this->Item->recursive = 0;
		$fields = array('id','title');
		$story_items = $this->Item->findAllByStoryId($path['Path']['story_id'],$fields);
		
		$this->Path->recursive = 0;
		$this->Path->unbindModel(array('belongsTo' => array('Chapter','Story')));
		$chapter_paths = $this->Path->findAllByChapterId($path['Path']['chapter_id'],$fields);
		
		debug($this->request->data);
		
		//debug($chapter_paths);
		//debug($story_items);
		
		$this->set(compact('events','chapters','stories','requirement_types','story_items','chapter_paths'));
	}
	
	public function edit_ajax($id){
		
		$this->layout = false;
		
		if (!$this->Path->exists($id)) {
			throw new NotFoundException(__('Invalid path'));
		}		
		
		$options = array('conditions' => array('Path.' . $this->Path->primaryKey => $id));
		$path = $this->request->data = $this->Path->find('first', $options);	
				
		//debug($path['Path']);
		$chapter_id = $path['Path']['chapter_id'];
		
		$chapters = $this->Chapter->find('list');
		$stories = $this->Story->find('list');
		
		$conditions = array('conditions' => array('Event.chapter_id' => $chapter_id));
			
		//$this->Event->recursive = 0;
		$this->Event->unbindModel(array('belongsTo' => array('Chapter')));		
		$events = $this->Event->find('all',$conditions);
		
		$requirement_types = $this->RequirementType->find('list');
		
		//debug($requirement_types);
		
		$this->Item->recursive = 0;
		$fields = array('id','title');
		$story_items = $this->Item->findAllByStoryId($path['Path']['story_id'],$fields);
		
		$this->Path->recursive = 0;
		$this->Path->unbindModel(array('belongsTo' => array('Chapter','Story')));
		$chapter_paths = $this->Path->findAllByChapterId($path['Path']['chapter_id'],$fields);
		
		//debug($this->request->data);
				
		$this->set(compact('events','chapters','stories','requirement_types','story_items','chapter_paths'));		
		
	}

	public function delete($id = null) {
		$this->Path->id = $id;
		if (!$this->Path->exists()) {
			throw new NotFoundException(__('Invalid path'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Path->delete()) {
			$this->Session->setFlash(__('Path deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Path was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
