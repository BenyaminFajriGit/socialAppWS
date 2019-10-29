<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPost extends CI_Controller{
    public function __construct()
    {
        $this->load->model('Post');
    }

    public function addPost(){
        date_default_timezone_set('Asia/Jakarta');
        $time = new DateTime();
        $data = array(
            'id_post' => '',
            'id_user' => $this->input->get('id_user'),
            'username' => $this->input->get('username'),
            'post' => $this->input->get('post'),
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
        $idPost = $this->input->get('id_post');
        $res = $this->Post->getPostById($idPost);

        echo json_encode($res);
    }

    public function updatePost(){
        $idPost = $this->input->get('id_post');
        $postCaption = $this->input->get('post');

        $result = $this->Post->updatePost($idPost, $postCaption);

        echo json_encode($result);
    }

    public function deletePost(){
        $idPost = $this->input->get('id_post');
        $res = $this->Post->deletePost($idPost);

        echo json_encode($res);
    }
}
