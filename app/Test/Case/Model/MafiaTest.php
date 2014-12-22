<?php
App::uses('Mafia', 'Model');

/**
 * Mafia Test Case
 *
 */
class MafiaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mafia',
		'app.family',
		'app.member'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Mafia = ClassRegistry::init('Mafia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Mafia);

		parent::tearDown();
	}

}
