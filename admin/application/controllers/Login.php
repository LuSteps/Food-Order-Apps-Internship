<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('session');
        $this->load->library('form_validation'); // Load the Form Validation library
        $this->load->helper('url');
    }


    public function index()
    {
        $this->check_timeout();
        $data['judul'] = 'Login';
        $this->load->view('templates/header_login', $data);
        $this->load->view('login/index');
        $this->load->view('templates/footer_login');
    }

    public function forget_password()
    {
        $data['judul'] = 'Forget Password';
        // $data['login_item'] = $this->login_model->get_login();
        $this->load->view('templates/header_login', $data);
        $this->load->view('login/forget_password');
        $this->load->view('templates/footer_login');
    }

    public function strong_password($password)
    {
        if (preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*-\/\.])(?=.*[0-9])(?=.*[a-z]).{8,}$/', $password)) {
            return true;
        } else {
            $this->form_validation->set_message('strong_password', 'The {field} must contain at least 8 characters, 1 capital letter, 1 number, and 1 special character.');
            return false;
        }
    }

    public function login_btn()
    {
        $this->form_validation->set_rules('email1', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|callback_strong_password');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Password must contain at least 8 characters, 1 capital letter, and 1 special character.');
            redirect('login');
            $this->session->sess_destroy();
        } else {
            $email1 = $this->input->post('email1');
            $password1 = $this->input->post('password1');
            if ($this->login_model->check_credentials($email1, $password1)) {
                $fullname = $this->login_model->get_fullname($email1, $password1);
                $this->session->set_userdata('fullname', $fullname);
                $this->session->set_userdata('email', $email1);
                $this->session->set_userdata('login_time', time());
                $this->session->set_userdata('logged_in', true);
                redirect('category');
            } else {
                $this->session->set_flashdata('error2', 'Username and password are incorrect.');
                redirect('login');
                // $this->session->sess_destroy();
            }
        }
    }

    public function check_timeout()
    {
        $login_time = $this->session->userdata('login_time');

        if (isset($login_time) && time() - $login_time > 3600) {
            $this->session->set_flashdata('timeout', 'Your session has expired due to inactivity.');
            $this->session->sess_destroy();
            redirect('login');
        } else {
            $this->session->set_userdata('login_time', time());
        }
    }

    public function register()
    {
        // Handle user registration
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function change_password()
    {
        if ($this->input->post()) {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_new_password = $this->input->post('confirm_new_password');

            if (empty($current_password) || empty($new_password) || empty($confirm_new_password)) {
                $this->session->set_flashdata('error2', 'All fields are required.');
                redirect('login/forget_password');
            }
            $is_match = $this->login_model->check_old_password($current_password);
            if (!$is_match) {
                $this->session->set_flashdata('error2', 'Old password is not correct.');
                redirect('login/forget_password');
            }
            if ($new_password != $confirm_new_password) {
                $this->session->set_flashdata('error2', 'New password and confirm new password must be the same.');
                redirect('login/forget_password');
            }
            $validation_result = $this->login_model->validate_password($new_password);
            if ($validation_result !== true) {
                $this->session->set_flashdata('error2', $validation_result);
                redirect('login/forget_password');
            } else {
                $hashed_password = $new_password;
                $this->login_model->change_password($hashed_password);
                $this->session->set_flashdata('success', 'Password successfully changed');
                redirect('login/forget_password');
            }
        } else {
            $this->load->view('forget_password');
        }
    }

    public function redirect_back()
    {
        redirect('category/index');
    }
}
