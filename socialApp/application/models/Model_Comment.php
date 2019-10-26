<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Model_Comment extends CI_Model
{
    private $_table = "comment";

    public $id;
    public $username;
    public $id_post;
    public $caption;
    public $tanggal;


     public function getByIdPost($id_post)
     {
          return $this->db->get_where($this->_table, ["id_post" => $id_post])->result();
     }

     public function add($username,$id_post,$caption){
          $this->username=$username;
          $this->id_post=$id_post;
          $this->caption=$caption;
          $this->tanggal= date("Y-m-d H:i:s");
       return $this->db->insert($this->_table, $this);
     }

     public function delete($id){
          return $this->db->delete($this->_table,  array("id" => $id));
     }


   
}
