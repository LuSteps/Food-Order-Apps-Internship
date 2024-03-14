<?php
class Report_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_report($slug = FALSE)
    {
        if ($slug === FALSE) {
            $query = $this->db->get('po_purchase_meal_hdr');
            return $query->result_array();
        }

        $query = $this->db->get_where('po_purchase_meal_hdr', array('id' => $slug));
        return $query->row_array();
    }

    public function get_view_report($id)
	{
		$this->db->select('*');
		$this->db->from('order_hdr');
		$this->db->where('id_po_purchase_meal_hdr', $id);
		$query = $this->db->get();
		return $query->result_array();
	}


    public function get_product($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->get('menu');
			return $query->result_array();
		}

		$query = $this->db->get_where('menu', array('id' => $slug));
		return $query->row_array();
	}

    public function get_dates($id)
	{
		$this->db->select('*');
		$this->db->from('po_purchase_meal_hdr');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

    public function get_menu_daily_set($id)
	{
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price, po_purchase_meal_dtl.id_menu');
		$this->db->from('po_purchase_meal_dtl');
		$this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
		$this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
		$this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
		$this->db->where('id_category', 1);
		$this->db->where('id_po_purchase_meal_hdr', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function get_menu_rice()
	// {
	// 	$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
	// 	$this->db->from('po_purchase_meal_dtl');
	// 	$this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
	// 	$this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
	// 	$this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
	// 	$this->db->where('id_category', 7);
	// 	// $this->db->where('po_purchase_meal_hdr.status', 'active');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	// public function get_menu_fruit()
	// {
	// 	$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
	// 	$this->db->from('po_purchase_meal_dtl');
	// 	$this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
	// 	$this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
	// 	$this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
	// 	$this->db->where('id_category', 8);
	// 	// $this->db->where('po_purchase_meal_hdr.status', 'active');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	public function get_menu_pasta($id)
	{
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
		$this->db->from('po_purchase_meal_dtl');
		$this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
		$this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
		$this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
		$this->db->where('id_category', 3);
		$this->db->where('id_po_purchase_meal_hdr', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_menu_breakfast($id)
	{
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
		$this->db->from('po_purchase_meal_dtl');
		$this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
		$this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
		$this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
		$this->db->where('id_category', 4);
		$this->db->where('id_po_purchase_meal_hdr', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_holidays()
	{
		$query = $this->db->get('holiday');
		return $query->result_array();
	}

    public function get_detail_report($id)
    {
        $this->db->select(
			'po_purchase_meal_dtl.id as id,
			po_purchase_meal_dtl.id_menu,
			po_purchase_meal_dtl.price,
			po_purchase_meal_dtl.date as po_date,
			order_dtl.id_po_purchase_meal_dtl, 
			order_hdr.student_name,
			order_hdr.submitted_date as date,
			order_hdr.id as id_ord,
			order_hdr.grade_level as grade,
			menu.id as menu_id,
			menu.name as menu,
			category.category as category'
		);
        $this->db->from('order_dtl');
        $this->db->join('po_purchase_meal_dtl', 'order_dtl.id_po_purchase_meal_dtl = po_purchase_meal_dtl.id');
        $this->db->join('order_hdr', 'order_dtl.id_order = order_hdr.id');
        $this->db->join('menu', 'menu.id = po_purchase_meal_dtl.id_menu');
        $this->db->join('category', 'category.id = po_purchase_meal_dtl.id_category');
		$this->db->where('po_purchase_meal_dtl.id_po_purchase_meal_hdr', $id);
        $query = $this->db->get();
		return $query->result_array();
	}

    public function summary($id)
    {
        $this->db->select(
			'po_purchase_meal_dtl.id as id,
			po_purchase_meal_dtl.price,
			po_purchase_meal_dtl.date as po_date,
			order_dtl.id_po_purchase_meal_dtl, 
			order_hdr.student_name,
			order_hdr.submitted_date as date,
			order_hdr.id as id_ord,
			order_hdr.grade_level as grade,
			menu.id as menu_id,
			menu.name as menu,
			category.category as category'
		);
        $this->db->from('order_dtl');
        $this->db->join('po_purchase_meal_dtl', 'order_dtl.id_po_purchase_meal_dtl = po_purchase_meal_dtl.id');
        $this->db->join('order_hdr', 'order_dtl.id_order = order_hdr.id');
        $this->db->join('menu', 'menu.id = po_purchase_meal_dtl.id_menu');
        $this->db->join('category', 'category.id = po_purchase_meal_dtl.id_category');
		$this->db->where('order_hdr.id', $id);
        $query = $this->db->get();
		return $query->result_array();
	}
		

	public function get_child_menus($id)
	{
		$this->db->select('menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price, po_purchase_meal_dtl.parent, po_purchase_meal_dtl.id');
		$this->db->from('po_purchase_meal_dtl');
		$this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
		$this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
		$this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
		$this->db->where('parent !=', 0);
		$this->db->where('po_purchase_meal_hdr.id', $id);
		$query = $this->db->get();
		$result = $query->result_array();

		// Group child menus by parent
		$child_menus = [];
		foreach ($result as $row) {
				$parent = $row['parent'];
				unset($row['parent']);  // remove parent from row
				$child_menus[$parent][] = $row;
		}

		return $child_menus;
	}
}