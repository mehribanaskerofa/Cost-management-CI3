<?php
class Pay_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database(); // Load the database library
	}
	public $amount;
	public $payment_id;
	public $currency_id;
	public $feedback;
	public $income;
	public $expense;
	public function get_all_pays()
	{
		$query = $this->db->get('pay');
		return $query->result_array();
	}
	public function inserts()
	{
		$this->amount = $_POST['amount']; // please read the below note
		$this->payment_id = $_POST['payment_id']; // please read the below note
		$this->currency_id = $_POST['currency_id']; // please read the below note
		$this->feedback = $_POST['feedback']; // please read the below note
		$this->income = $_POST['income']; // please read the below note
		$this->expense = $_POST['expense']; // please read the below note

		$this->db->insert('pay', $this);
	}
}
