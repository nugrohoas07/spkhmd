<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_table_komentar extends CI_Migration
{

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "komentar";

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'id_user' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'id_calon' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'komentar' => array(
				'type' => 'TEXT',
			),
			'anonim' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => 0, // Default to non-anonymous
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->_table_name, TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}
}
