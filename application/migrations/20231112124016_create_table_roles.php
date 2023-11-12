<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_roles extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "roles";

	public function up()
	{
		$this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'role' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      )
    ));
    $this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->_table_name, TRUE);

		// Add admin default
		$data1 = array(
			'role' => 'admin'
		);
		$data2 = array(
			'role' => 'user'
		);
		$this->db->insert($this->_table_name, $data1);
		$this->db->insert($this->_table_name, $data2);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>