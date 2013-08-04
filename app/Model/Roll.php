<?php
App::uses('AppModel', 'Model');
/**
 * Roll Model
 *
 * @property EventsPath $EventsPath
 */
class Roll extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'sides' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/*
	public $hasMany = array(
		'EventsPath' => array(
			'className' => 'EventsPath',
			'foreignKey' => 'roll_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
*/
}
