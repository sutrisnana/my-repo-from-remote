<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->library('form_validation');
    $this->load->library('pagination');
  }

  public function index()
  {
    $data['tittle'] = 'Data User';

    //ambil data keyword
    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    //config
    //$config['total_rows']= $this->Asset_model->countAllPc();
    $this->db->like('user_name', $data['keyword']);
    $this->db->or_like('name', $data['keyword']);
    $this->db->from('user');

    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 10;

    //initialize
    $this->pagination->initialize($config);

    $data['start'] = $this->uri->segment(3);
    $data['usr'] = $this->User_model->getAllUser_model($config['per_page'], $data['start'], $data['keyword']);
    $data['user'] = $this->User_model->getUserBySession();

    $this->load->view('templates/head', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/foot');
  }

  public function detailUser($user_id)
  {
    $data['tittle'] = 'Detail User';
    $data['user'] = $this->User_model->getUserByID_model($user_id);

    $this->load->view('templates/head', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/detail_user', $data);
    $this->load->view('templates/foot');
  }

  public function getUbahUser()
  {
    echo json_encode($this->User_model->getUserByID_model($_POST['id']));
  }

  public function ubahUser()
  {
    $data['tittle'] = 'Data User';

    //ambil data keyword
    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    //config
    //$config['total_rows']= $this->Asset_model->countAllPc();
    $this->db->like('user_name', $data['keyword']);
    $this->db->or_like('name', $data['keyword']);
    $this->db->from('user');

    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 10;

    //initialize
    $this->pagination->initialize($config);

    $data['start'] = $this->uri->segment(3);
    $data['usr'] = $this->User_model->getAllUser_model($config['per_page'], $data['start'], $data['keyword']);
    $data['user'] = $this->User_model->getUserBySession();

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('roleid', 'Role Id', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/index', $data);
      $this->load->view('templates/foot');
    } else {
      $this->User_model->ubahUser_model();
      $this->session->set_flashdata('flash', 'Diubah');
      redirect('user');
    }
  }
}
