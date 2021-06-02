<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

    public function getAllFaq()
    {
        $data = $this->db->get('tb_faq')->result_array();
        $output = [
            'status' => 200,
            'message' => 'All Data Retrieved',
            'data' => $data
        ];
        
        echo json_encode($output);
    }

    public function getFaqByID()
    {
        $id = $this->input->get('id');
        $data = $this->db->get_where('tb_faq', ['id_faq' => $id])->row_array();
        $output = [
            'status' => 200,
            'message' => 'Data Retrieved',
            'data' => $data
        ];
        
        echo json_encode($output);
    }

}

/* End of file Faq.php */
 ?>