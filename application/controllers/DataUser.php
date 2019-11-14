<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUser extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User');
    }

    public function addUser(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'no_hp' => $this->input->post('no_hp')
        );

        $res = $this->User->addUser($data);

        echo json_encode($res);
    }

    public function validateLogin(){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );

        $res = $this->User->validateLogin($data);

        echo json_encode($res);
    }

    public function updateData(){
        $idUser = $this->input->post('id_user');
        $newData = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp')
        );

        $res = $this->User->updateUser($idUser, $newData);

        echo json_encode($res);
    }
	
	public function updatePassword(){
        $idUser = $this->input->post('id_user');
        $oldPassword = md5($this->input->post('oldPassword'));
        $password = md5($this->input->post('password'));

        $res = $this->User->updatePassword($oldPassword,$password, $idUser);

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
