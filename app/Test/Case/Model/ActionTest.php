<?php
App::uses('Action', 'Model');

/**
 * Action Test Case
 *
 */
class ActionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.action',
		'app.requirement_type',
		'app.requirement',
		'app.path',
		'app.chapter',
		'app.story',
		'app.user',
		'app.stat',
		'app.item',
		'app.items_user',
		'app.event',
		'app.event_paths',
		'app.step'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Action = ClassRegistry::init('Action');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Action);

		parent::tearDown();
	}

}
