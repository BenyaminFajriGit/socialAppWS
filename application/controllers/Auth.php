<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        //$this->load->model('');
    }

    public function tryLogin()
    {
        //var logged_in; or something similar in CI
        //get username (nama row persis kek gitu di db)
        //get password (sama persis juga)
        //read db
        //make sure username and password match with db
        //if match == logged_in = true
        //else logged_in = false

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        //buat yang baca, maap yak agak ngaret ngerjainnya wkwk
    }

    public function logout(){
        //end session or something, google that stuff
    }

}
