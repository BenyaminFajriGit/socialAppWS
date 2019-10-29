<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKomentar extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Komentar');
    }

    public function addComment(){
        $data = array(
            'id_comment' => '',
            'id_post' => $this->input->post('id_post'),
            'id_user' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'comment' => $this->input->post('comment')
        );

        $res = $this->Komentar->setComment($data);

        echo json_encode($res);
    }

    public function getPostComment(){
        $idPost = $this->input->post('id_post');

        $res = $this->Komentar->getPostComment($idPost);

        echo json_encode($res);
    }

    public function deleteComment(){
        $idComment = $this->input->post('id_comment');

        $res = $this->Komentar->deleteComment($idComment);

        echo json_encode($res);
    }
}
