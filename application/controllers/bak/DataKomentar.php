<?php

class DataKomentar extends CI_Controller{
    public function __construct()
    {
        $this->load->model('Komentar');
    }

    public function addComment(){
        $data = array(
            'id_post' => $this->input->get('id_post'),
            'id_user' => $this->input->get('id_user'),
            'username' => $this->input->get('username'),
            'comment' => $this->input->get('comment')
        );

        $res = $this->Komentar->setComment($data);

        echo json_encode($res);
    }

    public function getPostComment(){
        $idPost = $this->input->get('id_post');

        $res = $this->Komentar->getPostComment($idPost);

        echo json_encode($res);
    }

    public function deleteComment(){
        $idComment = $this->input->get('id_comment');

        $res = $this->Komentar->deleteComment($idComment);

        echo json_encode($res);
    }
}
