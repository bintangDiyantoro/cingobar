<?php

class People extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'People Page Data';
        $this->load->model('People_model', 'people');

        //config
        $config['base_url'] = 'http://localhost/people/index'; //index must be written
        $config['total_rows'] = $this->people->num();
        $config['per_page'] = 12;
        $config['num_links'] = 3;

        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</nav></ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $data['peoples'] = $this->people->pagination($config['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('people/index');
        $this->load->view('templates/footer');
    }
}
