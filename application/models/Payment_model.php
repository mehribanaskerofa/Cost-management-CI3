<?php
class Payment_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database(); // Load the database library
	}
	public $payment;
	public function get_all_payments()
	{
		$query = $this->db->get('payment');
		return $query->result_array();
	}
	public function inserts()
	{
		$this->payment = $_POST['payment']; // please read the below note

		$this->db->insert('payment', $this);
	}
}
