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
    public function updateScholar($id){
        $data = [
            'name' => $this->input->post('name', true),
            'nis' => $this->input->post('nis', true),
            'email' => $this->input->post('email', true),
            'department' => $this->input->post('department', true)
        ];
        $this->db->update('scholars', $data, ['id' => $id ]);
    }
    public function delete($id){
        $this->db->delete('scholars', array('id' => $id));
    }
}