<?php
App::uses('AppController', 'Controller');
/**
 * Actions Controller
 *
 */
class ActionsController extends AppController {



	public function add(){
		
		$this->autoRender = false;
		

		$event_id = $this->request->data['event_id'];
		$chapter_id = $this->request->data['chapter_id'];
		$path_id = $this->request->data['path_id'];
		$success_fail = $this->request->data['success_fail'];			

		$this->Action->create();
		
		$add = $remove = 0;
		if($this->request->data['addRemove'] == 0){ $remove = 1; } else { $add = 1; }
		
		$this->Action->set('event_id',$event_id);
		$this->Action->set('add',$add);
		$this->Action->set('remove',$remove);
		$this->Action->set('requirement_type_id',$this->request->data['type']);		
		$this->Action->set('value',$this->request->data['value']);
		
		$result = $this->Action->save();
		
		//debug($result);
		
		$action_id = $result['Action']['id'];
		
		$SQL = 'UPDATE event_paths SET ' . $success_fail . "_action=$action_id WHERE chapter_id=$chapter_id AND event_id=$event_id  AND path_id=$path_id LIMIT 1;";
		
		$this->Action->query($SQL);
		
		$return['id'] = $action_id;
		$return['sql'] = $SQL;
		
		header('Content-Type: application/json');
		echo json_encode($return);
		
		//debug($result);
		
	}
	
	public function remove(){
		
		$this->autoRender = false;
		
		$id = $this->request->data['action_id'];
		$field = $this->request->data['field'];
		
		$this->Action->delete($id,false);
		$this->Action->query("UPDATE event_paths SET " . $field . "_action = NULL WHERE " . $field . "_action = $id");
		
	}


}
