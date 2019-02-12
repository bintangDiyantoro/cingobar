<?php 

class Scholar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
        $this->load->model('Scholar_model');
    }
    public function index(){
        $data['title'] = 'Scholars';
        $data['scholars'] = $this->Scholar_model->getAllScholars();
        $this->load->view('templates/header', $data);
        $this->load->view('scholar/index', $data);
        $this->load->view('templates/footer');
    }
}