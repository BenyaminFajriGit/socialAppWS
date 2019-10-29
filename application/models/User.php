<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class User extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function addUser($dataUser){
        $query = $this->db->insert('users', $dataUser);

        if ($query) {
            $res['status'] = true;
            $res['message'] = 'Data Berhasil Ditambahkan';
        } else {
            $res['status'] = false;
            $res['message'] = 'Data Tidak Berhasil Ditambahkan';
        }

        return $res;
    }

    public function userAll(){
        $query = $this->db->get("users");
        $result = $query->result();

        if (empty($result) || is_null($result)) {
            $res['status'] = false;
            $res['message'] = 'Data tidak Ditemukan';
        } else {
            $res['status'] = true;
            $res['message'] = 'Data Ditemukan';
            $res['data'] = $result;
        }
        return $res;
    }

    public function getDataUser($idUser){
        $query = $this->db->where("id", $idUser);
        $result = $query->get('users')->result();

        if (empty($result) || is_null($result)) {
            $res['status'] = false;
            $res['message'] = 'Data tidak Ditemukan';
        } else {
            $res['status'] = true;
            $res['message'] = 'Data Ditemukan';
            $res['data'] = $result;
        }
        return $res;
    }

    public function deleteUser($idUser){
        $query = $this->db->delete('users', array('id', $idUser));

        if ($query) {
            $res['status'] = true;
            $res['message'] = 'Data berhasil dihapus';
        } else {
            $res['status'] = false;
            $res['message'] = 'Data tidak berhasil dihapus';
        }

        return $res;
    }
}
