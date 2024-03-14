<?php
defined('BASEPATH') or exit('No direct script access allowed');

class summary extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('summary_model');
    }

    public function show_order()
    {
        $this->load->model('summary_model');

        // Get the order data
        $order_data = $this->summary_model->get_order_data();

        // Pass the order data to the view
        $this->load->view('summary_view', ['order_data' => $order_data]);
    }
}
