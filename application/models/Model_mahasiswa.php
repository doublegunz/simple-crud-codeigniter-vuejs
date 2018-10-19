<?php defined('BASEPATH') OR exit('No direct sript access allowed');

class Model_mahasiswa extends CI_Model {

    public function getAll()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function save($data)
    {
        $this->db->insert('mahasiswa', $data);
    }

    public function insert_multiple($data) 
    {
        $this->db->insert_batch('mahasiswa', $data);
    }
}