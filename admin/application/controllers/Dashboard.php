<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('category_model');
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        // $data['category_item'] = $this->category_model->get_category();
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}