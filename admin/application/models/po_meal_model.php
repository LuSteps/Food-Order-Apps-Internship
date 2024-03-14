<?php
class Po_meal_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_po_meal($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->get('po_purchase_meal_hdr');
			return $query->result_array();
		}

		$query = $this->db->get_where('po_purchase_meal_hdr', array('id' => $slug));
		return $query->row_array();
	}

	public function get_daily_set()
	{
		$this->db->where('category_id', 1);
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	public function get_pasta()
	{
		$this->db->where('category_id', 3);
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	public function get_breakfast()
	{
		$this->db->where('category_id', 4);
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	// begin

	public function get_all_menus()
	{
		$this->db->select('id, name, category_id');
		$this->db->from('menu');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_menus($child_category)
	{
		$this->db->select('id, name, category_id');
		$this->db->from('menu');
		$this->db->where('category_id', $child_category);


		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_categories()
	{
		$this->db->select('id, category');
		$this->db->from('category');
		
		$query = $this->db->get();
		return $query->result_array();
	}

	// end

	public function insertData($data)
	{
		$query = $this->db->query('SELECT id FROM po_purchase_meal_hdr ORDER BY id');
		$result = $query->result_array();
		$existing_ids = array_column($result, 'id');

		$id = 1;
		while (in_array($id, $existing_ids)) {
			$id++;
		}

		$data['id'] = $id;

		$this->db->insert('po_purchase_meal_hdr', $data);
		return $this->db->insert_id();
	}

	public function insertMeal($data)
	{
		$this->db->insert('po_purchase_meal_dtl', $data);
		return $this->db->insert_id();
	}

	public function get_by_id($inserted_id_hdr)
	{
		$this->db->select('remark, begin_date, end_date, status');
		$this->db->from('po_purchase_meal_hdr');
		$this->db->where('id', $inserted_id_hdr);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_details_by_id($id_hdr)
	{
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price, po_purchase_meal_dtl.id_menu, po_purchase_meal_dtl.date');
		$this->db->from('po_purchase_meal_dtl');
		$this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
		$this->db->where('po_purchase_meal_dtl.id_po_purchase_meal_hdr', $id_hdr);
		$query = $this->db->get();
		return $query->result();
	}

	public function deleteData($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('po_purchase_meal_hdr');

		$this->db->where('id_po_purchase_meal_hdr', $id);
		$this->db->delete('po_purchase_meal_dtl');
	}
}
