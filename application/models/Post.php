<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Post extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function addPost($dataPost)
    {
        $query = $this->db->insert('post', $dataPost);

        if ($query) {
            $res['status'] = true;
            $res['message'] = 'Data Berhasil Ditambahkan';
        } else {
            $res['status'] = false;
            $res['message'] = 'Data Tidak Berhasil Ditambahkan';
        }

        return $res;
    }

    public function getAllPost()
    {
        $query = $this->db->select('*')->from('post P')->join('user U', 'P.id_user = U.id_user');
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

    public function getPostById($idPost)
    {
        $query = $this->db->select('*')->from('post P')->join('user U', 'P.id_user = U.id_user')->where('P.id_post', $idPost);
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

    public function updatePost($idPost, $newPost)
    {
        $this->db->where('id_post', $idPost);
        $query = $this->db->update('post', array('post' => $newPost));

        if ($query) {
            $res['status'] = true;
            $res['message'] = 'Data berhasil diubah';
        } else {
            $res['status'] = false;
            $res['message'] = 'Data tidak berhasil diubah';
        }

        return $res;
    }

    public function deletePost($idPost)
    {
        $query = $this->db->delete('post', array('id_post' => $idPost));

        if ($query) {
            $res['status'] = true;
            $res['message'] = 'Data berhasil dihapus';
        } else {
            $res['status'] = false;
            $res['message'] = 'Data tidak berhasil dihapus';
        }

        return $res;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table,  array("id" => $id));
    }

    public function search($key)
    {
        return $this->db->like("username", $key)->or_like("judul", $key)->or_like("caption", $key)->get($this->_table)->result();
    }
}
