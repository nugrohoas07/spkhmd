<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_table_calon_ketua extends CI_Migration
{

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "calon_ketua";

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'nim' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'prodi' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'angkatan' => array(
				'type' => 'VARCHAR',
				'constraint' => '4',
			),
			'semester' => array(
				'type' => 'VARCHAR',
				'constraint' => '2',
			),
			'ipk' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'visi_misi' => array(
				'type' => 'TEXT',
			),
			'pengalaman_org' => array(
				'type' => 'TEXT',
			),
			'foto' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'waktu_input TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->_table_name, TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}
}
