<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_User');
    }

    public function check()
    {
        $post = $this->input->post();
        $username = $post['username'];
        $password = $post['password'];
        $user = $this->Model_User->check($username, $password);
        echo json_encode($user);
    }

    public function add()
    {
        $user=false;
        $post = $this->input->post();
        $username = $post['username'];
        $password = $post['password'];
        $nama = $post['nama'];
        $noHP = $post['noHP'];
        $user = $this->Model_User->add($username, $password, $nama, $noHP);
        if ($user) {
            echo "Registrasi berhasil ";
        } else
            echo "Registrasi gagal";
    }

    public function showInsert()
    {
        $this->load->view('Form_Registration');
    }

    public function get($username)
    {
        echo json_encode($this->Model_User->get($username));
    }

    public function update()
    {
        $user=false;
        $post = $this->input->post();
        $username = $post['username'];
        $password = $post['password'];
        $nama = $post['nama'];
        $noHP = $post['noHP'];
        $user = $this->Model_User->update($username, $password, $nama, $noHP);
        if ($user) {
            echo "Update berhasil ";
        } else
            echo "Update gagal";
    }
}
