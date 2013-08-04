<?php
App::uses('AppController', 'Controller');

class EventsController extends AppController {
	
	public $uses = array('Event','Path','Roll');
	
	public function get_primary($story_id){
		
		$this->autoRender = false;
		$conditions = array('conditions' => array('story_id' => $story_id,'primary' => 1));
		//$this->Event->recursive = 0;
		
		//$this->Event->unbindModel(array('belongsTo' => array('Chapter')));
		
		
		
		$event = $this->Event->find('first',$conditions);
		
		
		debug($event);
		
		$path_ids = array();
		
		foreach($event['EventPaths'] as $evtp){
			
			$path_ids[] = $evtp['path_id'];
			
		}
		
		debug($path_ids);
		$this->Path->recursive = 2;
		$this->Path->unbindModel(array('belongsTo' => array('Chapter','Story')));
		$this->Path->unbindModel(array('hasMany' => array('EventPaths')));		
		$paths = $this->Path->findAllById($path_ids);
		
		debug($paths);
		
		
	}
	
	public function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}
	
	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		
		
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);
		
		//debug($event);
		
		//$this->Path->recursive = 0;
		$this->Path->unbindModel(array('belongsTo' => array('Chapter','Story')));
		$this->Path->unbindModel(array('hasMany' => array('EventPaths')));		
		$paths = $this->Path->findAllByChapterId($event['Event']['chapter_id']);
		
		//debug($paths);
		
		$this->set(compact('event','paths'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		}
		$chapters = $this->Event->Chapter->find('list');
		//$paths = $this->Event->Path->find('list');
		$this->set(compact('chapters', 'paths'));
	}
	
	public function edit_ajax($id = null){
		
		$this->layout = false;

		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->request->data = $this->Event->find('first', $options);

		$chapter_id = $this->request->data['Event']['chapter_id'];
		
		$this->Event->recursive = 0;
		$this->Event->unbindModel(array('belongsTo' => array('Chapter')));
		$events = $this->Event->findAllByChapterId($chapter_id);

		$conditions = array('conditions' => array('Path.chapter_id' => $chapter_id));
		$paths = $this->Path->find('list',$conditions);

		$rolls = $this->Roll->find('all');
		
		$this->set(compact('paths','events','rolls','id'));		
		
	}
	

	public function edit($id = null) {
	
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
			
			//debug($this->request->data);
			
			$i = 0;
			
			$event_id = $this->request->data['Event']['id'];
			$chapter_id = $this->request->data['Event']['chapter_id'];			
			
			$eventsPaths = array();
			foreach($this->request->data as $key => $val){
				

				
				if(substr($key,0,8) == 'PathPath' && trim($val) != ''){
				
					$fieldVal = str_replace('PathPath','',$key);
					$arrKey = substr($fieldVal,0,1);
					$field = strtolower(substr($fieldVal,1));
					$eventsPaths[$arrKey][$field] = $val;
					$eventsPaths[$arrKey]['chapter_id'] = $chapter_id;
					$eventsPaths[$arrKey]['event_id'] = $event_id;										

				}
				
				$i = $i + 1;
			}

			if(!empty($eventsPaths)){
				
				//Clear existing rows
				$this->Path->query("DELETE FROM event_paths WHERE chapter_id = '$chapter_id' AND event_id = '$event_id';");
				
				foreach($eventsPaths as $evtp){
					
					if(isset($evtp['path_id']) && $evtp['path_id'] != 0 && $evtp['success'] != 0){
					
						$SQL = '';					
						$fields = $values = array();
						
						$SQL = 'INSERT INTO event_paths (';
						foreach($evtp as $key => $val){ $fields[] = $key; }
						$SQL .= implode(',',$fields);
						$SQL .= ') VALUES (';
						foreach($evtp as $key => $val){ $values[] = $val; }
						$SQL .= implode(',',$values);
						$SQL .= ');';
	
						$this->Path->query($SQL);
						
					}
					
				}	
			}		
		
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'));
				//$this->redirect(array('action' => 'index'));
				$this->redirect(array('action' => 'view',$this->request->data['Event']['id']));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
		
		$chapter_id = $this->request->data['Event']['chapter_id'];
		
		$this->Event->recursive = 0;
		$this->Event->unbindModel(array('belongsTo' => array('Chapter')));
		$events = $this->Event->findAllByChapterId($chapter_id);

		$conditions = array('conditions' => array('Path.chapter_id' => $chapter_id));
		$paths = $this->Path->find('list',$conditions);

		$rolls = $this->Roll->find('all');
		
		
		$this->set(compact('paths','events','rolls','id'));
	}

		public function delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('Event deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Event was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
