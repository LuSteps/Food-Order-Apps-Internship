<?php
class Category_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    // Model for get category data
    public function get_category($slug = FALSE)
    {
        if ($slug === FALSE) {
            $query = $this->db->get('category');
            return $query->result_array();
        }

        $query = $this->db->get_where('category', array('id' => $slug));
        return $query->row_array();
    }
    
    // Model for get admin fullname
    public function get_admin_id($fullname)
    {
        $this->db->select('id');
        $this->db->from('admin');
        $this->db->where('fullname', $fullname);
        $query = $this->db->get();

        // Check if a result is returned
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->id;
        } else {
            return null; // or handle this case as you see fit
        }
    }

    // Model for get category
    // public function get_category_name($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('category');
    //     $this->db->where('id', $id);
    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         $result = $query->row();
    //         return $result->category;
    //     } else {
    //         return null; // or handle this case as you see fit
    //     }
    // }

    // Model for get category by id to delete data
    public function get_by_id($id)
    {
        return $this->db->get_where('category', ['id' => $id])->row_array();
    }
    
    // Model for index category view
    public function paginate($limit, $start)
    {
        $this->db->limit($limit, $start);        
        $this->db->select('*');
		$this->db->from('category');
		$query = $this->db->get();
		return $query->result_array();
    }

    // Model for add new category
    public function create_category($category, $sort, $admin_id)
    {
        $this->db->select_max('id');
        $result = $this->db->get('category')->row();
        $highest_id = $result->id;
        $new_id = $highest_id + 1;
        $session_data = $this->session->userdata('logged_in');
        $data = array(
            'category' => $category,
            'Sort' => $sort,
            'id' => $new_id,
            'created_by' => $admin_id,
            'created_date' => date('Y-m-d H:i:s', strtotime('+6 hours'))
        );

        return $this->db->insert('category', $data);
    }

    // Model for update category data
    public function update_category($id, $category, $sort, $admin_id)
    {
        $data = array(
            'category' => $category,
            'Sort' => $sort,
            'modified_by' => $admin_id,
            'modified_date' => date('Y-m-d H:i:s', strtotime('+6 hours'))
        );

        $this->db->where('id', $id);
        return $this->db->update('category', $data);
    }

    // Model for delete category data
    public function delete_category($id)
    {
        $this->db->where('id_category', $id);
        $query = $this->db->get('po_purchase_meal_dtl');

        if ($query->num_rows() == 0) {
            $this->db->where('id', $id);
            $this->db->delete('category');
            
            return true;
        } else {
            return 'Fail: Cannot edit category because it exists in po_purchase_meal_dtl';
        }
    }

}
