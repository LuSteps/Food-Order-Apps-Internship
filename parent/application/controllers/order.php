<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('product_model');
		$this->load->helper('url_helper');
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('user_agent');
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');


		// $this->load->library('security');
	}

	public function index()
	{
		$data = array(
			'product_item' => $this->product_model->get_product(),
			'dates' => $this->product_model->get_dates(),
			'menu_daily_set' => $this->product_model->get_menu_daily_set(),
			'holidays' => $this->product_model->get_holidays(),
			// 'menu_soup' => $this->product_model->get_menu_soup(),
			// 'menu_protein' => $this->product_model->get_menu_protein(),
			// 'menu_rice' => $this->product_model->get_menu_rice(),
			// 'menu_fruit' => $this->product_model->get_menu_fruit(),
			'menu_pasta' => $this->product_model->get_menu_pasta(),
			'menu_breakfast' => $this->product_model->get_menu_breakfast(),
			'child_menus' => $this->product_model->get_child_menus(),
			'csrf' => array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			)
		);

		$this->load->view('order', $data);
	}

	public function submit_order()
	{
		$this->load->model('product_model');
		// $this->product_model->submit_order1();

		if (!empty($_POST["checkboxes"])) {
			$result = $this->product_model->submit_order1(); //result = index of inserted data
			if ($result > 0) { // klo misal dia bisa disubmit makanannya
				// Transaction was successful
				$this->session->set_flashdata('thank_you_note', 'Thank you for ordering from us!!');
			}

			$data['order_details'] = $this->product_model->get_last_order_details($result); // Get the last order details, sisipin paramter id
			$data['id'] = $this->product_model->get_last_order_id($result);
			$data['order_menus'] = $this->product_model->get_last_order_menu($result);
			$data['summary_id'] = $this->product_model->getActiveMealId();
			
			// start edit
			// $data['total'] = $this->product_model->total();
			// end trial

			$this->load->view('summary', $data);
		} else {
			// Transaction failed
			$this->session->set_flashdata('error_message', 'Ordering menu failed as there was no menu selected');
			redirect($this->agent->referrer());
		}
	}

	public function summary()
	{
		// Fetch the summary data
		$data['summary'] = $this->report_model->summary();
		$data['id'] = $this->product_model->get_last_order_id();
		$data['summary_id'] = $this->product_model->getActiveMealId();

		// Add more data to the array without overwriting it
		$data['holidays'] = $this->report_model->get_holidays();
		$data['dates'] = $this->report_model->get_date($data['id']);
		$data['judul'] = 'Summary';

		// Add the condition to the detail_report
		$po_dates = array();
		foreach ($data['summary'] as &$drpt) {
			$datetime = $drpt['date'];
			$date = new DateTime($datetime);
			$drpt['date_only'] = $date->format('Y-m-d');

			// Add the po_date to the po_dates array
			$po_dates[] = $drpt['po_date'];
		}

		// Remove duplicates from the po_dates array
		$po_dates = array_unique($po_dates);

		// Add the po_dates array to the data array
		$data['po_dates'] = $po_dates;

		// Load the view with the data
		$this->load->view('report/summary', $data);
	}
}
