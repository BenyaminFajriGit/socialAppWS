<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class User extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function addUser($dataUser){
        if ($this->cekUser($dataUser['username'])) {
            $query = $this->db->insert('user', $dataUser);

            if($query){
                $res['status'] = true;
                $res['message'] = 'Data Berhasil Ditambahkan';
            }else{
                $res['status'] = false;
                $res['message'] = 'Data Tidak Berhasil Ditambahkan';
            }
        }
        else {
            $res['status'] = false;
            $res['message'] = 'Data Sudah Ada';
        }

        return $res;
    }

    public function cekUser($username){
        $query = $this->db->where('username', $username)->get('user');

        if($query->num_rows() == 0){
            $status = true;
        }else{
            $status = false;
        }

        return $status;
    }

    public function validateLogin($data){
        $query = $this->db->where($data);
        $result = $query->get('user')->result();

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

    public function userAll(){
        $query = $this->db->get("user");
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

    public function updateUser($idUser, $newData){
        $sameUsername= $this->db->where('username', $newData['username'])->where("id_user!='$idUser'")->get('user');
        if($sameUsername->num_rows() == 0){
            $query = $this->db->where('id_user', $idUser)->update('user', $newData);

            if ($query) {
                $res['status'] = true;
                $res['message'] = 'Data Berhasil Diubah';
            } else {
                $res['status'] = false;
                $res['message'] = 'Data Tidak Berhasil Diubah';
            }
        }
            else {
            $res['status'] = false;
            $res['message'] = 'Data Sudah Ada';
        }

        return $res;
    }

    public function getDataUser($idUser){
        $query = $this->db->where("id_user", $idUser);
        $result = $query->get('user')->result();

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
        $query = $this->db->delete('user', array('id_user' => $idUser));

        if ($query) {
            $res['status'] = true;
            $res['message'] = 'Data berhasil dihapus';
        } else {
            $res['status'] = false;
            $res['message'] = 'Data tidak berhasil dihapus';
        }

        return $res;
    }
	
	public function updatePassword($oldPassword,$password, $idUser){
        $query = $this->db->set('password', $password)->where('id_user', $idUser)->where('password',$oldPassword)->update(user);

        if ($query) {
            $res['status'] = true;
            $res['message'] = 'Data Berhasil Diubah';
        } else {
            $res['status'] = false;
            $res['message'] = 'password lama salah';
        }

        return $res;
    }
}
