<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infrastruktur extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Infrastruktur_model');
    $this->load->library('form_validation');
    $this->load->library('pagination');
  }

  public function index()
  {
    $data['tittle'] = 'Asset Infrastruktur IT';

    //ambil data keyword2
    if ($this->input->post('submit')) {
      $data['keyword2'] = $this->input->post('keyword2');
      $this->session->set_userdata('keyword2', $data['keyword2']);
    } else {
      $data['keyword2'] = $this->session->userdata('keyword2');
    }

    $this->db->like('part_name', $data['keyword2']);
    $this->db->or_like('item_id_ax', $data['keyword2']);
    $this->db->or_like('part_detail', $data['keyword2']);
    $this->db->or_like('area_part', $data['keyword2']);
    $this->db->or_like('note', $data['keyword2']);
    $this->db->or_like('bpp', $data['keyword2']);
    $this->db->from('infrastruktur');

    //config
    $config['base_url'] = 'http://10.0.0.23/ci-assetit/infrastruktur/index/';
    $config['num_links'] = 2;

    //styling
    $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
    $config['full_tag_close'] =   '</ul></nav>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] =   '</li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] =   '</li>';

    $config['next_link'] = '&gt'; //'&raquo'
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] =   '</li>';

    $config['prev_link'] = '&lt'; //'&laquo'
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] =   '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] =   '</a></li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] =   '</li>';

    $config['attributes'] = array('class' => 'page-link');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page2'] = 15;

    //initialize
    $this->pagination->initialize($config);

    $data['start2'] = $this->uri->segment(3);
    $data['infrastruktur'] = $this->Infrastruktur_model->getAllInfrastruktur($config['per_page2'], $data['start2'], $data['keyword2']);
    $data['user'] = $this->User_model->getUserBySession();


    $this->load->view('templates/head', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('infrastruktur/index', $data);
    $this->load->view('templates/foot');
  }
}
