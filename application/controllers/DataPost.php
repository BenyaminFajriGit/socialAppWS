<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPost extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post');
    }

    public function addPost(){
        date_default_timezone_set('Asia/Jakarta');
        $time = new DateTime();
        $data = array(
            'id_post' => 0,
            'id_user' => $this->input->post('id_user'),
            'post' => $this->input->post('post'),
            'waktu' => $time->format('H:i:s')
        );

        $res = $this->Post->addPost($data);
        
        echo json_encode($res);
    }

    public function getDataPostAll(){
        $res = $this->Post->getAllPost();

        echo json_encode($res);
    }

    public function getPostById(){
        $idPost = $this->input->post('id_post');
        $res = $this->Post->getPostById($idPost);

        echo json_encode($res);
    }

    public function getPostByUserId(){
        $idUser = $this->input->post('id_user');
        $res = $this->Post->getPostByUserId($idUser);

        echo json_encode($res);
    }

    public function updatePost(){
        $idPost = $this->input->post('id_post');
        $postCaption = $this->input->post('post');

        $result = $this->Post->updatePost($idPost, $postCaption);

        echo json_encode($result);
    }

    public function deletePost(){
        $idPost = $this->input->post('id_post');
        $res = $this->Post->deletePost($idPost);

        echo json_encode($res);
    }
}
