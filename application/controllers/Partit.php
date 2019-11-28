<?php

class Partit extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Partit_model');
    $this->load->library('form_validation');
    $this->dbSql = $this->load->database('dbsqlsrv', TRUE); //get data from SqlServer
  }
  public function index()
  {
    $data['tittle'] = 'Stok Part IT';
    $data['asset'] = $this->Partit_model->getAllPart_model();
    $data['InvAx'] = $this->Partit_model->getPartAX_SqlModel(); //get data from SqlServer
    $data['user'] = $this->User_model->getUserBySession();

    if ($this->session->userdata('role_id') == '3') {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('partit/index_user', $data);
      $this->load->view('templates/foot');
    } else {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('partit/index', $data);
      $this->load->view('templates/foot');
    }
  }

  public function tambahPart()
  {
    $data['tittle'] = 'Stok Part IT';
    $data['asset'] = $this->Partit_model->getAllPart_model();
    $data['InvAx'] = $this->Partit_model->getPartAX_SqlModel(); //get data from SqlServer
    $data['user'] = $this->User_model->getUserBySession();

    $this->form_validation->set_rules('part_id', 'Part Id', 'required');
    $this->form_validation->set_rules('part_detail', 'Detail', 'required');
    $this->form_validation->set_rules('bpp_number', 'Nomor BPP', 'required');
    $this->form_validation->set_rules('part_qty', 'Qty', 'required');

    if ($this->form_validation->run() == FALSE) {
      if ($this->session->userdata('role_id') == '3') {
        $this->load->view('templates/head', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('partit/index_user', $data);
        $this->load->view('templates/foot');
      } else {
        $this->load->view('templates/head', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('partit/index', $data);
        $this->load->view('templates/foot');
      }
    } else {
      $this->Partit_model->addNewPart_model();
      $this->Partit_model->saveImagePart_model();
      $this->session->set_flashdata('flash', 'Ditambahkan');
      redirect('partit');
    }
  }

  public function getPartName()
  {
    echo json_encode($this->Partit_model->getPartItById_model($_POST['id']));
  }
}
