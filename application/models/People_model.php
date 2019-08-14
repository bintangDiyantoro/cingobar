<?php

class People_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('peoples')->result_array();
    }
    public function pagination($limit, $start)
    {
        return $this->db->get('peoples', $limit, $start)->result_array();
    }
    public function num()
    {
        return $this->db->get('peoples')->num_rows();
    }
}
