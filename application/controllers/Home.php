<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_admin')) {
            redirect('Auth');
        }
    }

    public function chat()
    {
        $this->load->view('home');
    }

    public function dashboard()
    {
        $data['articles'] = $this->db->get('tb_articles')->result_array();
        $this->load->view('admin/index', $data);
    }

    public function addArticle()
    {
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $min = $this->input->post('cuplikan');
        $arr = explode(' ', $isi);
        $read = floor(count($arr) / 200);
        if ($read == 0) {
            $read = 1;
        }
        $this->uploads();
        $data = [
            'article_title' => $judul,
            'article_content' => $isi,
            'article_min' => $min,
            'article_est_time_read' => $read,
        ];
        $this->db->insert('tb_articles', $data);
        $this->session->set_flashdata('message', 'Data Saved!');
        redirect('Home/dashboard');
    }

    public function removeArticle($id) 
    {
        $this->db->delete('tb_articles', ['id_article' => $id]);
        $this->session->set_flashdata('message', 'Data Deleted!');
        redirect('Home/dashboard');
    }

    public function editArticle()
    {
        $id= $this->input->post('id_article');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $min = $this->input->post('cuplikan');
        $arr = explode(' ', $isi);
        $read = floor(count($arr) / 200);
        if ($read == 0) {
            $read = 1;
        }
        $old_data = $this->db->get_where('tb_articles', ['id_article' => $id])->row_array();
        $arr = str_split($old_data['article_image']);
        // var_dump(count($arr));die;
        $image_path = '.';
        for ($i=24; $i < count($arr); $i++) { 
            $image_path .= $arr[$i];
        }
        if($_FILES['upload']['name']){
            unlink($image_path);
        }
        $this->uploads();
        $data = [
            'article_title' => $judul,
            'article_content' => $isi,
            'article_min' => $min,
            'article_est_time_read' => $read,
        ];
        $this->db->update('tb_articles', $data, ['id_article' => $id]);
        $this->session->set_flashdata('message', 'Data Updated!');
        redirect('Home/dashboard');
    }
    
    public function uploads()
    {
        $uploadgambar = $_FILES['upload']['name'];

        if ($uploadgambar) {
            # code...
            $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/uploads/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('upload')) {
                # code...
                $img = base_url('assets/uploads/') . $this->upload->data('file_name');
                $this->db->set('article_image', $img);
            } else {
                echo $this->upload->displays_errors();
                die;
            }
        }
    }
}

/* End of file Home.php */
