<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_table_pemira extends CI_Migration
{

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "pemira";

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'status' => array(
				'type' => 'ENUM("0", "1")',  // 0 = tidak aktif, 1 = aktif
				'default' => '0',
				'comment' => '0 = tidak aktif, 1 = aktif'
			),
			'kamp_tulis_awal' => array(
				'type' => 'DATE'
			),
			'kamp_tulis_akhir' => array(
				'type' => 'DATE'
			),
			'kamp_lisan' => array(
				'type' => 'DATETIME'
			),
			'lok_lisan' => array(
				'type' => 'VARCHAR',
				'constraint' => '255'
			),
			'debat' => array(
				'type' => 'DATETIME'
			),
			'lok_debat' => array(
				'type' => 'VARCHAR',
				'constraint' => '255'
			),
			'pemilihan' => array(
				'type' => 'DATETIME'
			),
			'pemilihan_akhir' => array(
				'type' => 'TIME'
			),
			'lok_pemilihan' => array(
				'type' => 'VARCHAR',
				'constraint' => '255'
			),
			'pengumuman' => array(
				'type' => 'DATE'
			),
			'keterangan' => array(
				'type' => 'TEXT'
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
