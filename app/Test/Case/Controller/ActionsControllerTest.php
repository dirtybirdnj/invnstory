<?php
App::uses('ActionsController', 'Controller');

/**
 * ActionsController Test Case
 *
 */
class ActionsControllerTest extends ControllerTestCase {

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

}
