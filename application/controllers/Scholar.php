<?php 

class Scholar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
        $this->load->model('Scholar_model');
        $this->load->library('form_validation');
    }
    public function index(){
        $data['title'] = 'Scholars';
        $data['scholars'] = $this->Scholar_model->getAllScholars();
        $this->load->view('templates/header', $data);
        $this->load->view('scholar/index', $data);
        $this->load->view('templates/footer');
    }
    public function insert(){
        $data['title'] = 'Scholars';
        $data['scholars'] = $this->Scholar_model->getAllScholars();
        $this->form_validation->set_rules('name','name', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('scholar/index', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->Scholar_model->insertScholar($_POST);
            header('Location: '.base_url().'scholar');
        }
    }
}