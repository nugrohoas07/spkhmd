<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_table_bobot extends CI_Migration
{

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "bobot";

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
			'id_kriteria' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
			'bobot' => array(
				'type' => 'INT',
				'constraint' => 11,
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
