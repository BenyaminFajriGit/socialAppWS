<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Model_Comment');
    }

    public function getByIdPost($idPost){
        $user=$this->Model_Comment->getByIdPost($idPost);
        echo json_encode($user) ;
    }


    public function add(){
        $post = $this->input->post();
        $username = $post['username'];
        $id_post = $post['id_post'];
        $caption = $post['caption'];
        $comment = $this->Model_Comment->add($username, $id_post, $caption);
        if ($comment) {
            echo "Comment berhasil dibuat";
        } else
            echo " Comment gagal dibuat";
    }

    
    public function delete(){
        $post = $this->input->post();
        $id = $post['id'];
         if($this->Model_Comment->delete($id)){
            echo "Comment berhasil Didelete ";
         }else{
            echo "Comment gagal Didelete ";
         }
    }

    

    

}