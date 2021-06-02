<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article_model', 'article');
    }
    

    public function getAllArticle()
    {
        $data = $this->article->getAllArticle();
        $output = [
            'status' => 200,
            'message' => 'All Data Retrieved',
            'data' => $data
        ];
        
        echo json_encode($output);
    }

    public function getArticleById($id)
    {
        $data = $this->article->getArticleById($id);
        $output = [
            'status' => 200,
            'message' => "Article with id $id was successfully retrieved",
            'data' => $data
        ];
        echo json_encode($output);
    }

}

/* End of file Article.php */


?>