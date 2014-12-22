<?php
App::uses('MembersSkill', 'Model');

/**
 * MembersSkill Test Case
 *
 */
class MembersSkillTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.members_skill',
		'app.members',
		'app.skills'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MembersSkill = ClassRegistry::init('MembersSkill');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MembersSkill);

		parent::tearDown();
	}

}
