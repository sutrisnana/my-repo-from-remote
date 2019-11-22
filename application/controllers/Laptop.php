<?php

class Laptop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laptop_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['tittle'] = 'Asset Laptop';
        $data['laptop'] = $this->Laptop_model->getAllLaptop_model();
        $data['user'] = $this->User_model->getUserBySession();
        $data['start'] = $this->uri->segment(3);

        $this->load->view('templates/head', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laptop/index', $data);
        $this->load->view('templates/foot');
    }
}
