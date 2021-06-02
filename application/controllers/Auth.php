<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->load->view('auth');
        // if ($this->session->userdata('id_admin')) {
        //     redirect('Home');
        // }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = hash('sha256', $this->input->post('password'));
        $data = $this->db->get_where('tb_admin', ['username_admin' => $username])->row_array();
        if ($data) {
            if ($data['password_admin'] == $password) {
                $session = [
                    'id_admin' => $data['id_admin'],
                    'nama' => $data['nama_admin'],
                ];
                $this->session->set_userdata($session);
                redirect('Home/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Wrong Password');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Wrong Username');
            redirect('Auth');
        }
    }
}

/* End of file Auth.php */
