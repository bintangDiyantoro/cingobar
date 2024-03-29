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
        if($this->input->post('keyword')){
            $data['scholars'] = $this->Scholar_model->searchScholar();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('scholar/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id){
        $data['title'] = 'Detail';
        $data['detail'] = $this->Scholar_model->getWhere($id);
        $this->load->view('templates/header', $data);
        $this->load->view('scholar/detail', $data);
        $this->load->view('templates/footer', $data);
    }
    public function insert(){
        $data['title'] = 'Scholars';
        $data['scholars'] = $this->Scholar_model->getAllScholars();
        $this->form_validation->set_rules('name','name', 'required');
        $this->form_validation->set_rules('nis', 'nis', 'required|numeric');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('scholar/index', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->Scholar_model->insertScholar($_POST);
            $this->session->set_flashdata('addFlash', 'Data successfully added!');
            redirect('Scholar');
            // header('Location: '.base_url().'scholar');
        }
    }
    public function getUpdate(){
        echo json_encode($this->Scholar_model->getWhere($_POST['id']));
    }
    public function update(){
        $data['title'] = 'Scholars';
        $data['scholars'] = $this->Scholar_model->getAllScholars();
        $this->form_validation->set_rules('name','name', 'required');
        $this->form_validation->set_rules('nis', 'nis', 'required|numeric');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('scholar/index', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->Scholar_model->updateScholar($_POST['id']);
            $this->session->set_flashdata('addFlash', 'Data successfully updated!');
            redirect('Scholar');    
        }
    }
    public function delete($id){
        $this->Scholar_model->delete($id);
        $this->session->set_flashdata('delFlash', 'Data successfully Deleted!');
        redirect('scholar');
    }
}