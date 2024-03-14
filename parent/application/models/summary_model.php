<?php
defined('BASEPATH') or exit('No direct script access allowed');

class summary_model extends CI_Controller
{
    public function get_order_data()
    {
        // Query the database to get the order data
        $this->db->select('*');
        $this->db->from('order_hdr');
        $this->db->join('order_dtl', 'order_hdr.id = order_dtl.id_order');
        $query = $this->db->get();

        return $query->result_array();
    }
}
