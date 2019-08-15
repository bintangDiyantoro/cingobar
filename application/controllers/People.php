<?php

class People extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'People Page Data';
        $this->load->model('People_model', 'people');
        if ($this->input->post('submit')) {
            $keyword = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        // $config['total_rows'] = $this->people->num();
        $this->db->like('name', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->from('peoples');
        $config['total_rows'] = $this->db->count_all_results(); //to show the last count of query result
        $config['per_page'] = 7;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['peoples'] = $this->people->pagination($config['per_page'], $data['start'], $keyword);
        $data['total_rows'] = $config['total_rows'];
        $data['keyword'] = $keyword;
        $this->load->view('templates/header', $data);
        $this->load->view('people/index');
        $this->load->view('templates/footer');
    }
}
