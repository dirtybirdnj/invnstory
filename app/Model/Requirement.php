<?php
App::uses('AppModel', 'Model');
/**
 * Requirement Model
 *
 * @property Path $Path
 * @property RequirementType $RequirementType
 */
class Requirement extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'path_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'requirement_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'foreign_key' => array(
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

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Path' => array(
			'className' => 'Path',
			'foreignKey' => 'path_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'RequirementType' => array(
			'className' => 'RequirementType',
			'foreignKey' => 'requirement_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
