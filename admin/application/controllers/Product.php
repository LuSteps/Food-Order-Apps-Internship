<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    // Load Model and Validator
    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('product_model');
        // Log In Validator
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect('login');
        }
        $this->check_timeout();
    }

    // Timeout Website
    public function check_timeout()
    {
        $login_time = $this->session->userdata('login_time');

        // Session End after 1 hour
        if (isset($login_time) && time() - $login_time > 3600) {
            $this->session->set_flashdata('timeout', 'Your session has expired due to inactivity.');
            $this->session->sess_destroy();
            redirect('login');
        } else {
            $this->session->set_userdata('login_time', time());
        }
    }

    // Load Menu Index View
    public function index()
    {
        // Search Function
        if($this->input->post('keyword')){
            $data['keyword'] =  $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        
        // $this->db->like('name', $data['keyword']);
        // $this->db->from('menu');
        $data['judul'] = 'Menu';

        // Pagination Config
        $config['base_url'] = base_url('product/index');
        $config['total_rows'] = $this->db->count_all('menu');
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['page'] = $this->uri->segment(3);
        $data['category'] = $this->product_model->get_category();
        $category = $this->input->post('category');
        // if ($category == ""){
            $data['product'] = $this->product_model->paginate($config['per_page'], $data['page'], $data['keyword']);
        // } else {
        //     $data['product'] = $this->product_model->paginate($config['per_page'], $data['page'], $category);
        // }
        // $data['category'] = $this->product_model->get_category();

        $this->load->view('templates/header', $data);
        $this->load->view('product/index', $data);
        $this->load->view('templates/footer');

        header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    // Load Add Menu View and Function
    public function add_product()
    {
        $data['judul'] = 'Create New Menu'; 

        $data['categories'] = $this->product_model->get_category();
        $name = $this->input->post('name');
        $this->db->where('name', $name);
        $query = $this->db->get('menu');

        $this->form_validation->set_rules('category', 'category', 'required', array('required' => 'Category field must not be empty'));
        $this->form_validation->set_rules('name', 'name', 'required', array('required' => 'Category field must not be empty'));

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('product/add_product', $data);
            $this->load->view('templates/footer');

            $this->session->set_flashdata('flash ', 'Create New Menu Fail!');
            // redirect('product');
        } else {
            // Run if there is existing data in database
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('flash', 'Data already exist');
                redirect('product');
            } else {
                // Add New Menu if condition before doesn't met
                $category = $this->input->post('category');
                $name = $this->input->post('name');
                $session_name = $this->session->userdata('fullname');
                $admin_id = $this->product_model->get_admin_id($session_name);

                $this->product_model->create_menu($category, $name, $admin_id);
                $this->session->set_flashdata('flash', 'Create New Menu Succeed!');
                redirect('product');
            }
        }
    }

    // Load Edit Menu View
    public function edit_product($id)
    {
        $data['judul'] = 'Edit Product ' . $id;
        $data['menu'] = $this->product_model->get_by_id($id);
        $data['category'] = $this->product_model->get_category();
        // $data['product'] = $this->product_model->get_by_id();
        $this->load->view('templates/header', $data);
        $this->load->view('product/edit_product', $data);
        $this->load->view('templates/footer');
    }

    // Edit Menu Function
    public function update_menu()
    {
        // Load Input Data
        $id = $this->input->post('hf-id');
        $new_category = $this->input->post('Category');
        $name = $this->input->post('Name');
        $session_name = $this->session->userdata('fullname');
        $admin_id = $this->product_model->get_admin_id($session_name);
        
        // Checking if there is data in PO Purchase
        $this->db->where('id_menu', $id);
        $query = $this->db->get('po_purchase_meal_dtl');
        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('flash', 'Fail: Cannot edit menu because it exists in PO Purchase');
            redirect('product');
        } 
        
        // Load this if the condition above doesn;t met
        $this->product_model->update_menu($id, $new_category, $name, $admin_id);
        $this->session->set_flashdata('flash', 'Success: Product edited!');
        redirect('product');
    }

    // Load delete function
    public function delete_menu()
    {
        $id = $this->input->post('id');
        $this->db->where('id_menu', $id);
        $query = $this->db->get('po_purchase_meal_dtl');
        
        // Checking if there is data in PO Purchase
        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('flash', 'Fail: Cannot delete menu because it exists in PO Purchase');
            redirect('product');
        } else {
            // Load this if the condition before doesn't met
            $this->product_model->delete_menu($id);
            $this->session->set_flashdata('flash', 'Success: Menu deleted');
            redirect('product');
        }
    }
}

// public function create_menu()
// {
//     $data['judul'] = 'Create New Menu'; 
//     $data['categories'] = $this->product_model->get_category();
//     $name = $this->input->post('name');
//     $this->db->where('name', $name);
//     $query = $this->db->get('menu');

//     $this->form_validation->set_rules('category', 'category', 'required', array('required' => 'Category field must not be empty'));
//     $this->form_validation->set_rules('name', 'name', 'required', array('required' => 'Category field must not be empty'));

//     if ($this->form_validation->run() === FALSE) {
//         $this->load->view('templates/header', $data);
//         $this->load->view('product/add_product', $data);
//         $this->load->view('templates/footer');

//         $this->session->set_flashdata('flash ', 'Create New Menu Fail!');
//         // redirect('product');
//     } else {
//         if ($query->num_rows() > 0) {
//             $this->session->set_flashdata('flash', 'Data already exist');
//             redirect('product');
//         } else {
//             $category = $this->input->post('category');
//             $name = $this->input->post('name');
//             $session_name = $this->session->userdata('fullname');
//             $admin_id = $this->product_model->get_admin_id($session_name);

//             $this->product_model->create_menu($category, $name, $admin_id);
//             $this->session->set_flashdata('flash ', 'Create New Menu Succeed!');
//             redirect('product');
//         }
//     }
// }