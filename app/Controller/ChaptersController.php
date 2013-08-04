<?php
App::uses('AppController', 'Controller');

class ChaptersController extends AppController {

	public $uses = array('Chapter','Event');

    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    
    public function set_primary_event($chapter_id,$event_id){
	    
	    $this->autoRender = false;
		if (!$this->Chapter->exists($chapter_id)) {
			throw new NotFoundException(__('Invalid chapter'));
		}
		
		
		$conditions =  array('Event.chapter_id' => $chapter_id);
		$data = array('Event.primary' => 0);
		$result = $this->Event->updateAll($data,$conditions);
		
		$this->Event->read(null,$event_id);
		$this->Event->set('primary',1);
		$this->Event->save();	    
	    
    }
    
	public function index() {
		$this->Chapter->recursive = 0;
		$this->set('chapters', $this->paginate());
	}

	public function view($id = null) {
		if (!$this->Chapter->exists($id)) {
			throw new NotFoundException(__('Invalid chapter'));
		}
		$options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
		$chapter = $this->Chapter->find('first', $options);
		
		//$chapter_id = 
		
		$this->set('chapter', $chapter);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Chapter->create();
			if ($this->Chapter->save($this->request->data)) {
				$this->Session->setFlash(__('The chapter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chapter could not be saved. Please, try again.'));
			}
		}
		$stories = $this->Chapter->Story->find('list');
		$this->set(compact('stories'));
	}

	public function edit($id = null) {
		if (!$this->Chapter->exists($id)) {
			throw new NotFoundException(__('Invalid chapter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Chapter->save($this->request->data)) {
				$this->Session->setFlash(__('The chapter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chapter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
			$this->request->data = $this->Chapter->find('first', $options);
		}
		$stories = $this->Chapter->Story->find('list');
		$this->set(compact('stories'));
	}

	public function delete($id = null) {
		$this->Chapter->id = $id;
		if (!$this->Chapter->exists()) {
			throw new NotFoundException(__('Invalid chapter'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Chapter->delete()) {
			$this->Session->setFlash(__('Chapter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Chapter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
