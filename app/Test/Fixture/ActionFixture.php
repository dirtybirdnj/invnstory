<?php
/**
 * ActionFixture
 *
 */
class ActionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'requirement_type_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'value' => array('type' => 'integer', 'null' => false, 'default' => null),
		'add' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'remove' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'requirement_type_id' => 1,
			'value' => 1,
			'add' => 1,
			'remove' => 1
		),
	);

}
