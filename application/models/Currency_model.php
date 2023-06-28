<?php
class Currency_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database(); // Load the database library
	}
	public $name;
	public function get_all_currencies()
	{
		$query = $this->db->get('currency');
		return $query->result_array();
	}
	public function inserts()
	{
		$this->name = $_POST['name']; // please read the below note

		$this->db->insert('currency', $this);
	}
}
