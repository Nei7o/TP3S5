<?php
/**
 * MemberFixture
 *
 */
class MemberFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'family_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'family_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'date_joined_clan' => array('type' => 'date', 'null' => false, 'default' => null),
		'date_of_birth' => array('type' => 'date', 'null' => true, 'default' => null),
		'date_deceased' => array('type' => 'date', 'null' => true, 'default' => null),
		'sexe' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'courriel' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'age' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'Clan_Number' => array('column' => 'family_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'family_id' => 1,
			'family_name' => 'Lorem ipsum dolor ',
			'name' => 'Lorem ipsum dolor ',
			'date_joined_clan' => '2014-10-15',
			'date_of_birth' => '2014-10-15',
			'date_deceased' => '2014-10-15',
			'sexe' => 'Lor',
			'courriel' => 'Lorem ipsum dolor sit amet',
			'age' => 1
		),
	);

}
