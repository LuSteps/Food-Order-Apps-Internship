<?php
class Holiday_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_holiday($slug = FALSE)
    {
        if ($slug === FALSE) {
                $query = $this->db->get('holiday');
                return $query->result_array();
        }

        $query = $this->db->get_where('holiday', array('id' => $slug));
        return $query->row_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('holiday', ['id' => $id])->row_array();
    }

    public function paginate($limit, $start)
    {
        $this->db->limit($limit, $start);        
        $this->db->select('*');
		$this->db->from('holiday');
		$query = $this->db->get();
		return $query->result_array();
    }

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

    public function add_holiday_data($admin_id)
    {
        $this->db->select_max('id');
        $result = $this->db->get('holiday')->row();
        $highest_id = $result->id;
        $new_id = $highest_id + 1;
        $data = [
            "id" => $new_id,
            "date" => $this->input->post('date', true),
            "description" => $this->input->post('description', true),
            "created_by" => $admin_id,
            "created_date" => date('Y-m-d H:i:s', strtotime('+6 hours'))
        ];

        $this->db->insert('holiday', $data);
    }

    public function edit_holiday_data($id, $data, $admin_id)
    {
        $data = [
            "date" => $this->input->post('date', true),
            "description" => $this->input->post('description', true),
            'modified_by' => $admin_id,
            'modified_date' => date('Y-m-d H:i:s', strtotime('+6 hours'))
        ];

        $this->db->where('id', $id);
        $this->db->update('holiday', $data);
    }
    
    public function delete_holiday_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('holiday', ['id' => $id]);
        return true;
    }

}