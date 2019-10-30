<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUser extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User');
    }

    public function addUser(){
        $data = array(
            'nama' => $this->input->get('nama'),
            'username' => $this->input->get('username'),
            'password' => md5($this->input->get('password')),
            'no_hp' => $this->input->get('no_hp')
        );

        $res = $this->User->addUser($data);

        echo json_encode($res);
    }

    public function validateLogin(){
        $data = array(
            'username' => $this->input->get('username'),
            'password' => md5($this->input->get('password'))
        );

        $res = $this->User->validateLogin($data);

        echo json_encode($res);
    }

    public function updateData(){
        $idUser = $this->input->get('id_user');
        $newData = array(
            'username' => $this->input->get('username'),
            'nama' => $this->input->get('nama'),
            'password' => md5($this->input->get('password')),
            'no_hp' => $this->input->get('no_hp')
        );

        $res = $this->User->updateUser($idUser, $newData);

        echo json_encode($res);
    }

    public function getAllUser(){
        $result = $this->User->userAll();

        echo json_encode($result);
    }

    public function getDataUser(){
        $username = $this->input->get('username');
        $result = $this->User->getDataUser($username);

        echo json_encode($result);
    }

    public function deleteUser(){
        $username = $this->input->get('username');
        $result = $this->User->deleteUser($username);

        echo json_encode($result);
    }
}
