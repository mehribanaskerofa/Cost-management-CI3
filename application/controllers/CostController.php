<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CostController extends CI_Controller {

	public function paymentType()
	{   $data['content'] = 'payment_type';
		$this->load->view('welcome_message', $data);
	}
	public function paymentTypeSend()
	{
		$data = array(
			'payment' => $this->input->post('payment')
		);
		$this->load->model('Payment_model');
		$this->Payment_model->inserts($data);

		$data['content'] = 'payment_type';
		$this->load->view('welcome_message', $data);

	}
	public function currencyType()
	{
		$data['content'] = 'currency';
		$this->load->view('welcome_message', $data);
	}
	public function currencySend()
	{

		$data = array(
			'name' => $this->input->post('name')
		);

		$this->load->model('Currency_model');
		$this->Currency_model->inserts($data);

		$data['content'] = 'currency';
		$this->load->view('welcome_message', $data);
	}


	public function __construct() {
		parent::__construct();
		$this->load->database(); // Load the database library
		$this->load->model('Payment_model');
		$this->load->model('Currency_model');
	}
	public function pay()
	{

		$this->load->model('Payment_model');
		$payments = $this->Payment_model->get_all_payments();

//
		$this->load->model('Currency_model');
		$currencies = $this->Currency_model->get_all_currencies();

//		die(json_encode($currencies[1]));
//		$data = array(
//			'payments' => $payments,
//			'currencies' => $currencies
//		);

		$data['payments']=$payments;
		$data['currencies']=$currencies;
		$data['content'] = 'pay';
		$this->load->view('welcome_message',$data);
	}

	public function paySend()
	{
		$data = array(
			'amount' => $this->input->post('amount'),
			'payment_id' => $this->input->post('payment_id'),
			'currency_id' => $this->input->post('currency_id'),
			'feedback' => $this->input->post('feedback'),
			'income' => $this->input->post('income'),
			'expense' => $this->input->post('expense')
		);

		$this->load->model('Pay_model');
		$this->Pay_model->inserts($data);
//		$this->load->helper('url');
//		redirect('pays');
		$data['content'] = 'pay';
		$this->load->view('welcome_message', $data);
	}

	public function datas()
	{
		$this->load->model('Pay_model');
		$pays = $this->Pay_model->get_all_pays();

		$this->load->model('Payment_model');
		$payments = $this->Payment_model->get_all_payments();

		$this->load->model('Currency_model');
		$currencies = $this->Currency_model->get_all_currencies();

		$data = array(
			'pays' => $pays,
			'payments' => $payments,
			'currencies' => $currencies
		);

		$data['content'] = 'all_data';
		$this->load->view('welcome_message', $data);
	}

	public function paymentFilter()
	{
		$data = $_POST['pay'];
		$id = $this->input->post('payment_id');

		$pays = array_filter($data, function($item) use($id) {
			return $item['payment_id'] == $id;
		});

		echo json_encode($pays);
	}

	public function currencyFilter()
	{
		$data = $_POST['pay'];
		$id = $this->input->post('currency_id');

		$pays = array_filter($data, function($item) use($id) {
			return $item['currency_id'] == $id;
		});

		echo json_encode($pays);
	}

	public function date_filter()
	{
		$pay_model = $this->load->model('Pay_model');
		$pays = $pay_model->where('date', $this->input->post('currency_id'))->get_all_pays();

		$data = array(
			'pays' => $pays
		);

		$data['content'] = 'all_data';
		$this->load->view('welcome_message', $data);
	}

}
