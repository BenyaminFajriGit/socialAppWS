<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUser extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User');
    }

    public function addUser(){
        $data = array(
            'id' => 0,
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'no_hp' => $this->input->post('no_hp')
        );

        $res = $this->User->addUser($data);

        echo json_encode($res);
    }

    public function getAllUser(){
        $result = $this->User->userAll();

        echo json_encode($result);
    }

    public function getDataUser(){
        $idUser = $this->input->post('id_user');
        $result = $this->User->getDataUser($idUser);

        echo json_encode($result);
    }

    public function deleteUser(){
        $idUser = $this->input->post('id_user');
        $result = $this->User->deleteUser($idUser);

        echo json_encode($result);
    }
}
