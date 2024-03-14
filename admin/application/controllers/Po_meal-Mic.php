<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po_meal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('po_meal_model');
	}

	public function index()
	{
		$data['judul'] = 'PO Purchase Meal';
		$data['po_meal'] = $this->po_meal_model->get_po_meal();
		$this->load->view('templates/header', $data);
		$this->load->view('po_meal/index');
		$this->load->view('templates/footer');
	}

	public function add_po_meal()
	{
		$data['judul'] = 'Create New PO Purchase Meal';
		// $data['po_meal'] = $this->po_meal_model->get_po_meal();
		$data['dailyset'] = $this->po_meal_model->get_daily_set();
		$data['pastas'] = $this->po_meal_model->get_pasta();
		$data['breakfasts'] = $this->po_meal_model->get_breakfast();
		$data['menus'] = $this->po_meal_model->get_menus();
		$this->load->view('templates/header', $data);
		$this->load->view('po_meal/add_po_meal', $data);
		$this->load->view('templates/footer');
	}

	public function edit_po_meal($inserted_id_hdr)
	{
		$data['judul'] = 'Edit PO Purchase Meal';
		$data['purchase_meal'] = $this->po_meal_model->get_by_id($inserted_id_hdr);
		$data['po_purchase_meal_dtl'] = $this->po_meal_model->get_details_by_id($inserted_id_hdr);
		$data['dailyset'] = $this->po_meal_model->get_daily_set();
		$data['pastas'] = $this->po_meal_model->get_pasta();
		$data['breakfasts'] = $this->po_meal_model->get_breakfast();
		$data['menus'] = $this->po_meal_model->get_menus();
		$this->load->view('templates/header', $data);
		$this->load->view('po_meal/edit_po_meal', $data);
		$this->load->view('templates/footer');
	}


	public function history_po_meal($inserted_id_hdr)
	{
		$data['judul'] = 'History PO Purchase Meal';
		$data['purchase_meal'] = $this->po_meal_model->get_by_id($inserted_id_hdr);
		$data['po_purchase_meal_dtl'] = $this->po_meal_model->get_details_by_id($inserted_id_hdr);

		$this->load->view('templates/header', $data);
		$this->load->view('po_meal/history_po_meal', $data);
		$this->load->view('templates/footer');
	}


	public function submitHdr()
	{
		$data = array(
			'remark' => $this->input->post('Title'),
			'begin_date' => $this->input->post('Begin'),
			'end_date' => $this->input->post('End'),
			'status' => $this->input->post('Status')
		);

		$this->po_meal_model->insertData($data);

		$inserted_id_hdr = $this->db->insert_id();
		return $inserted_id_hdr;
	}


	public function submitForm()
	{
		$id_po_purchase_meal_hdr = $this->submitHdr();

		$dailyset_parent = $this->input->post('Dailyset_parent');
		$dailyset_price = $this->input->post('Dailyset_price');
		$dailyset_dates = $this->input->post('Dates');
		$id_menu = $this->input->post('Id_menu');
		$price = $this->input->post('Price');


		foreach ($dailyset_parent as $i => $v) {
			if (!empty($dailyset_parent[$i]) && !empty($dailyset_price[$i])) {
				$data = array(
					'id_menu' => $dailyset_parent[$i],
					'price' => $dailyset_price[$i],
					'parent' => 0,
					'id_category' => 1,
					'date' => $dailyset_dates[$i][array_keys($dailyset_dates[$i])[0]],
					'id_po_purchase_meal_hdr' => $id_po_purchase_meal_hdr
				);
				$this->po_meal_model->insertMeal($data);
			}

			if (isset($id_menu[$i]) && is_array($id_menu[$i])) {
				foreach ($id_menu[$i] as $key => $value) {
					if (!empty($value) && !empty($price[$i][$key])) {
						list($menu_id, $category_id) = explode("-", $value);
						$data = array(
							'id_menu' => $menu_id,
							'price' => $price[$i][$key],
							'parent' => $dailyset_parent[$i],
							'id_category' => $category_id,
							'date' => $dailyset_dates[$i][array_keys($dailyset_dates[$i])[0]],
							'id_po_purchase_meal_hdr' => $id_po_purchase_meal_hdr
						);
						$this->po_meal_model->insertMeal($data);
					}
				}
			}
		}

		$pasta_parent = $this->input->post('Pasta_parent');
		$pasta_price = $this->input->post('Pasta_price');

		$pasta_dates = $this->input->post('Dates');


		foreach ($pasta_parent as $i => $v) {
			if (!empty($pasta_parent[$i]) && !empty($pasta_price[$i])) {
				$data = array(
					'id_menu' => $pasta_parent[$i],
					'price' => $pasta_price[$i],
					'parent' => 0,
					'id_category' => 3,
					'date' => $pasta_dates[$i][$i],
					'id_po_purchase_meal_hdr' => $id_po_purchase_meal_hdr
				);
				$this->po_meal_model->insertMeal($data);
			}
		}

		$breakfast_parent = $this->input->post('Breakfast_parent');
		$breakfast_price = $this->input->post('Breakfast_price');

		$breakfast_parent2 = $this->input->post('Breakfast_parent2');
		$breakfast_price2 = $this->input->post('Breakfast_price2');

		$breakfast_parent3 = $this->input->post('Breakfast_parent3');
		$breakfast_price3 = $this->input->post('Breakfast_price3');

		$breakfast_dates = $this->input->post('Dates');


		foreach ($breakfast_parent as $i => $v) {
			if (!empty($breakfast_parent[$i]) && !empty($breakfast_price[$i])) {
				$data = array(
					'id_menu' => $breakfast_parent[$i],
					'price' => $breakfast_price[$i],
					'parent' => 0,
					'id_category' => 4,
					'date' => $breakfast_dates[$i][$i],
					'id_po_purchase_meal_hdr' => $id_po_purchase_meal_hdr
				);
				$this->po_meal_model->insertMeal($data);
			}

			if (!empty($breakfast_parent2[$i]) && !empty($breakfast_price2[$i])) {
				$data2 = array(
					'id_menu' => $breakfast_parent2[$i],
					'price' => $breakfast_price2[$i],
					'parent' => 0,
					'id_category' => 4,
					'date' => $breakfast_dates[$i][$i],
					'id_po_purchase_meal_hdr' => $id_po_purchase_meal_hdr
				);
				$this->po_meal_model->insertMeal($data2);
			}

			if (!empty($breakfast_parent3[$i]) && !empty($breakfast_price3[$i])) {
				$data3 = array(
					'id_menu' => $breakfast_parent3[$i],
					'price' => $breakfast_price3[$i],
					'parent' => 0,
					'id_category' => 4,
					'date' => $breakfast_dates[$i][$i],
					'id_po_purchase_meal_hdr' => $id_po_purchase_meal_hdr
				);
				$this->po_meal_model->insertMeal($data3);
			}
		}
		return $id_po_purchase_meal_hdr;
	}

	public function submit()
	{
		$inserted_id_hdr = $this->submitForm();

		$this->session->set_flashdata('message', 'Insert PO and Menu Succeed!');
		redirect('po_meal/add_po_meal/' . $inserted_id_hdr);
	}
}
