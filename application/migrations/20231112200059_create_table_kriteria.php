<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_table_kriteria extends CI_Migration
{

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "kriteria";

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'kriteria' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->_table_name, TRUE);

		// Insert default data
		$default_data = array(
			array('kriteria' => 'Cerdas'),
			array('kriteria' => 'Tegas'),
			array('kriteria' => 'Visioner'),
			array('kriteria' => 'Bertanggung Jawab'),
			array('kriteria' => 'Disiplin'),
			array('kriteria' => 'Adil'),
			array('kriteria' => 'Komunikatif'),
			array('kriteria' => 'Inovatif'),
			array('kriteria' => 'Religius'),
			array('kriteria' => 'Berempati'),
		);

		$this->db->insert_batch('kriteria', $default_data);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}
}
