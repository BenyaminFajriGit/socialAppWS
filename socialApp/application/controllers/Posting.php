<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Model_Posting');
    }

    public function getAll(){
        $posts=$this->Model_Posting->getAll();
        echo json_encode($posts) ;
    }

    public function getById($id){
        $posts=$this->Model_Posting->getById($id);
        echo json_encode($posts) ;
    }

    public function getByUsername($username){
        $posts=$this->Model_Posting->getByUsername($username);
        echo json_encode($posts) ;
    }
    public function add(){
        $post = $this->input->post();
        $username = $post['username'];
        $judul = $post['judul'];
        $caption = $post['caption'];
        $posting = $this->Model_Posting->add($username, $judul, $caption);
        if ($posting) {
            echo "Posting berhasil dibuat";
        } else
            echo " Posting gagal dibuat";
    }

    public function update(){
        $posting=false;
        $post = $this->input->post();
        $id = $post['id'];
        $judul = $post['judul'];
        $caption = $post['caption'];
        $posting = $this->Model_Posting->update($id, $judul, $caption);
        if ($posting) {
            echo "Update Posting berhasil ";
        } else
            echo "Update Posting gagal";
    }
    public function delete(){
        $post = $this->input->post();
        $id = $post['id'];
         if($this->Model_Posting->delete($id)){
            echo "Posting berhasil Didelete ";
         }else{
            echo "Posting gagal Didelete ";
         }
    }

    public function search($key){
        $posting = $this->Model_Posting->search($key);
        echo json_encode($posting);
    }

    
    

}