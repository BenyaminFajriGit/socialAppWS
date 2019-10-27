<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUser extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User');
    }

    public function addUser(){
        $data = array(
            'id' => '',
            'nama' => $this->input->get('nama'),
            'username' => $this->input->get('username'),
            'password' => $this->input->get('password'),
            'no_hp' => $this->input->get('no_hp')
        );

        $res = $this->Post->addUser($data);

        echo json_encode($res);
    }

    public function getAllUser(){
        $result = $this->User->userAll();

        echo json_encode($result);
    }

    public function getDataUser(){
        $idUser = $this->input->get('id_user');
        $result = $this->User->getDataUser($idUser);

        echo json_encode($result);
    }

    public function deleteUser(){
        $idUser = $this->input->get('id_user');
        $result = $this->User->deleteUser($idUser);

        echo json_encode($result);
    }
}
