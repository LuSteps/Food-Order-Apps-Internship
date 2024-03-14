<?php
class Product_model extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
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

        public function paginate($limit, $start)
        {
                $this->db->limit($limit, $start);        
                $this->db->select('menu.id as menu_id, menu.name, category.category');
                $this->db->from('menu');
                $this->db->join('category', 'menu.category_id = category.id');
                // $this->db->where('menu.id', $id);
                $query = $this->db->get();
                return $query->result_array();
        }
        
        public function get_by_id($id)
        {
                // $this->db->limit($limit, $start);
                $this->db->select('menu.id as menu_id, menu.name, category.category');
                $this->db->from('menu');
                $this->db->join('category', 'menu.category_id = category.id');
                $this->db->where('menu.id', $id);
                $query = $this->db->get();
                return $query->row_array();
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

        public function get_category($slug = FALSE)
        {
                if ($slug === FALSE) {
                        $query = $this->db->get('category');
                        return $query->result_array();
                }

                $query = $this->db->get_where('category', array('id' => $slug));
                return $query->row_array();
        }

        public function create_menu($category, $name, $admin_id)
        {
                // $data = array(
                //         'category_id' => $category,
                //         'name' => $name
                // );

                // return $this->db->insert('menu', $data);

                $this->db->select_max('id');
                $result = $this->db->get('menu')->row();
                $highest_id = $result->id;
                $new_id = $highest_id + 1;
                $session_data = $this->session->userdata('logged_in');
                $data = array(
                        'id' => $new_id,
                        'category_id' => $category,
                        'name' => $name,
                        'created_by' => $admin_id,
                        'created_date' => date('Y-m-d H:i:s', strtotime('+6 hours'))
                );

                return $this->db->insert('menu', $data);
        }

        public function update_menu($id, $category_id, $name)
        {
                $data = array(
                        'category_id' => $category_id,
                        'name' => $name,
                );

                $this->db->where('id', $id);
                return $this->db->update('menu', $data);
        }

        public function delete_menu($id)
        {
                // $this->db->where('id', $id);
                // $this->db->delete('menu');
                $this->db->where('id_menu', $id);
                $query = $this->db->get('po_purchase_meal_dtl');

                if ($query->num_rows() == 0) {
                        $this->db->where('id', $id);
                        $this->db->delete('menu');
                        return true;
                } else {
                        return 'Fail: Cannot edit category because it exists in po_purchase_meal_dtl';
                }
        } 
}
