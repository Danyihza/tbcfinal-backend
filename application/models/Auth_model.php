<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function registerUser($data)
    {
        $this->db->insert('tb_user', $data);
    }

    public function getUser($uid)
    {
        return $this->db->get_where('tb_user', ['user_id' => $uid])->row_array();
    }

    public function checkUser($email)
    {
        return $this->db->get_where('tb_user', ['email_user' => $email])->row_array();
    }
}

/* End of file Auth_model.php */
