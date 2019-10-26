<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_Posting extends CI_Model
{
     private $_table = "Posting";

     public $id;
     public $username;
     public $judul;
     public $caption;
     public $tanggal;

     public function add($username,$judul,$caption){
          $this->username=$username;
          $this->judul=$judul;
          $this->caption=$caption;
          $this->tanggal= date("Y-m-d H:i:s");
       return $this->db->insert($this->_table, $this);
     }

     public function getAll()
     {
          return $this->db->get($this->_table)->result();
     }

     public function getById($id)
     {
          return $this->db->get_where($this->_table, ["id" => $id])->result();
     }

     public function getByUsername($username)
     {
          return $this->db->get_where($this->_table, ["username" => $username])->result();
     }

     public function update($id, $caption)
     {
          $this->id = $id;
          $this->caption = $caption;
          return $this->db->update($this->_table, array("caption" => $caption), array("id" => $id));
     }

     public function delete($id){
          return $this->db->delete($this->_table,  array("id" => $id));
     }

     public function search($key){
          return $this->db->like("username",$key)->or_like("judul",$key)->or_like("caption",$key)->get($this->_table)->result();
     }

}
