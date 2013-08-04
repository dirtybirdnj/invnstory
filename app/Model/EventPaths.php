<?php
App::uses('AppModel', 'Model');

class EventPaths extends AppModel {
	
	public $belongsTo = array('Event','Path');
	
}


?>