<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Komentar extends CI_Model{
    public function __construct(){
        $this->load->database();
        $this->load->model('Komentar');
    }

    public function setComment($data){
        $query = $this->db->insert('comment', $data);

        if($query){
            $komentarBerita = $this->getPostComment($data['id_post']);

            $res['status'] = true;
            $res['message'] = 'Data Berhasil Ditambahkan';
            $res['data'] = $komentarBerita;
        } else {
            $res['status'] = false;
            $res['message'] = 'Data Tidak Berhasil Ditambahkan';
        }

        return $res;
    }

    public function getPostComment($idPost){
        $query = $this->db->select('*')->from('comment C')->join('user U', 'C.id_user = U.id_user')->where('C.id_post', $idPost);
        $result = $query->get()->result();

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

    public function deleteComment($idComment){
        $query = $this->db->delete('comment', array('id_comment' => $idComment));

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
