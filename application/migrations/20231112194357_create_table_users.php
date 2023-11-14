<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_users extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "users";

	public function up()
	{
		$this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'username' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'unique' => TRUE
      ),
      'nama' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
      ),
      'password' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
      ),
      'role' => array(
        'type' => 'VARCHAR',
        'constraint' => '11',
      ),
    ));
    $this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->_table_name, TRUE);

		// Add admin default
		$data = array(
			'username' => 'admin',
			'nama' => 'admin',
			'password' => md5('AdminHMDTE23'),
			'role' => '1',
		);
		$this->db->insert($this->_table_name, $data);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>