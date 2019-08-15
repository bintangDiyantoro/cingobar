<?php

class People_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('peoples')->result_array();
    }
    public function pagination($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('email', $keyword);
        }
        return $this->db->get('peoples', $limit, $start)->result_array();
    }
    public function num()
    {
        return $this->db->get('peoples')->num_rows();
    }
}
