<?php

class Login_model extends CI_Model {

    public function check_credentials($email1, $password1)
    {
        $this->db->select('username, password, fullname');
        $this->db->from('admin');
        $this->db->where('username', $email1);
        $this->db->where('password', $password1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_fullname($email1, $password1)
    {
        $query = $this->db->get_where('admin', array('username' => $email1, 'password' => $password1));
        $result = $query->row_array();

        return $result['fullname'];
    }


    public function change_password($new_password)
    {
        $data = array(
            'password' => $new_password,
        );

        $this->db->where('username', $this->session->userdata('email'));
        return $this->db->update('admin', $data);
    }

    public function validate_password($password)
    {
        // Check if password is at least 8 characters long
        if (!preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*-\/\.])(?=.*[0-9])(?=.*[a-z]).{8,}$/', $password)) {
            return 'Password must be at least 8 characters long, has 1 capital letter and 1 special character.';
        } else {
            return true;
        }
    }

    public function check_old_password($current_password)
    {
        $this->db->where('username', $this->session->userdata('email'));
        $this->db->where('password', $current_password);
        $user = $this->db->get('admin')->row();
        return $user ? true : false;
    }
}
