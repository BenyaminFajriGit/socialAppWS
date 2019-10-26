<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Model_User extends CI_Model
{
    private $_table = "user";

    public $username;
    public $password;
    public $nama;
    public $noHP;

    //cek login kalau ada nilai kembalinya berarti username password benar
    public function check($username,$password){
         return $this->db->get_where($this->_table, array('username'=>$username, 'password'=>$password))->result();
    }

    public function get($username){
        return $this->db->get_where($this->_table, array('username'=>$username))->result();
   }

   public function add($username,$password,$nama,$noHP){
        $this->username=$username;
        $this->password=$password;
        $this->nama=$nama;
        $this->noHP=$noHP;
     return $this->db->insert($this->_table, $this);
}
public function update($username,$password,$nama,$noHP){
     $this->username=$username;
     $this->password=$password;
     $this->nama=$nama;
     $this->noHP=$noHP;
     return $this->db->update($this->_table,$this,array("username"=>$username));
}



}
