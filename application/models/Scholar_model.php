<?php 

class Scholar_model extends CI_Model {
    public function getAllScholars(){
        return $this->db->get('scholars')->result_array();
    }
    public function getWhere($id){
        return $this->db->get_where('scholars', ['id' => $id])->row_array();
    }
    public function insertScholar($data){
        $this->db->insert('scholars', $data);
    }
}