<?php

class AssetIt extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Asset_model');
    $this->load->model('History_model');
    $this->load->model('Partit_model');
    $this->load->library('form_validation');
    $this->load->library('pagination');
    $this->dbSql = $this->load->database('dbsqlsrv', TRUE);
  }

  public function index()
  {
    //$this->load->model('Asset_model');     
    $data['tittle'] = 'Asset PC';

    //ambil data keyword
    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    //config
    //$config['total_rows']= $this->Asset_model->countAllPc();
    $this->db->like('user', $data['keyword']);
    $this->db->or_like('Processor', $data['keyword']);
    $this->db->or_like('Dept', $data['keyword']);
    $this->db->or_like('jenis', $data['keyword']);
    $this->db->or_like('Ram', $data['keyword']);
    $this->db->or_like('user', $data['keyword']);
    $this->db->from('asset_pc');


    //config
    $config['base_url'] = 'http://10.0.0.23/ci-assetit/assetit/index/';
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
    $config['per_page'] = 15;

    //initialize
    $this->pagination->initialize($config);

    $data['start'] = $this->uri->segment(3);
    $data['asset'] = $this->Asset_model->getAsset_model($config['per_page'], $data['start'], $data['keyword']);
    $data['user'] = $this->User_model->getUserBySession();

    if ($this->session->userdata('role_id') == '3') {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('assetit/index_user', $data);
      $this->load->view('templates/foot');
    } else {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('assetit/index', $data);
      $this->load->view('templates/foot');
    }
  }

  public function tambahPC()
  {
    $data['tittle'] = 'Form Tambah PC';
    $data['user'] = $this->User_model->getUserBySession();

    $this->form_validation->set_rules('idpc', 'Id PC', 'required');
    $this->form_validation->set_rules('pcname', 'PC Name', 'required');
    $this->form_validation->set_rules('processor', 'Processor', 'required');
    $this->form_validation->set_rules('vga', 'VGA', 'required');
    $this->form_validation->set_rules('hdd', 'HDD', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('assetit/tambah', $data);
      $this->load->view('templates/foot');
    } else {
      $this->Asset_model->addNewPC_model();
      $this->session->set_flashdata('flash', 'Ditambahkan');
      redirect('assetit');
    }
  }

  public function hapusPc($id)
  {
    $this->Asset_model->hapusDataPc($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('assetit');
  }

  public function detailPc($id)
  {
    $data['tittle'] = 'Detail PC';
    $data['asset'] = $this->Asset_model->getAssetById_model($id);
    $data['user'] = $this->User_model->getUserBySession();

    $this->load->view('templates/head', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('assetit/detail', $data);
    $this->load->view('templates/foot');
  }

  public function ubahPC($id)
  {
    $data['tittle'] = 'Form Edit PC';
    $data['user'] = $this->User_model->getUserBySession();

    $data['opt_departement'] = ['Management', 'Warehouse', 'Purchasing', 'Engineering', 'It', 'Qa', 'Produksi', 'Hrd', 'Sales', 'R&D', 'Finance', 'Accounting', 'Ppic', 'Gm'];
    $data['opt_tahun'] = ['2014', '2015', '2016', '2017', '2018', '2019', '2020'];
    $data['opt_os'] = ['W7', 'W7 Sp1', 'W10'];
    $data['opt_jenis'] = ['PC', 'Laptop'];
    $data['opt_status'] = ['OK', 'Rusak', 'Perbaikan'];

    $data['assetit'] = $this->Asset_model->getAssetById_model($id);
    $this->form_validation->set_rules('idpc', 'Id PC', 'required');
    $this->form_validation->set_rules('pcname', 'PC Name', 'required');
    $this->form_validation->set_rules('processor', 'Processor', 'required');
    $this->form_validation->set_rules('vga', 'VGA', 'required');
    $this->form_validation->set_rules('hdd', 'HDD', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('assetit/ubah', $data);
      $this->load->view('templates/foot');
    } else {
      $this->Asset_model->editPC_model();
      $this->session->set_flashdata('flash', 'Diubah');
      redirect('assetit');
    }
  }

  public function historyPC($idpc)
  {
    $data['tittle'] = 'History PC';
    $data['asset'] = $this->History_model->getHistoryById_model($idpc);
    $data['user'] = $this->User_model->getUserBySession();

    $this->load->view('templates/head', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('assetit/history', $data);
    $this->load->view('templates/foot');
  }

  public function perbaikanPc()
  {
    $data['tittle'] = 'Perbaikan PC';
    $data['datawo'] = $this->Asset_model->getWO_SqlModel();
    $data['asset'] = $this->Asset_model->getAllAsset_model();
    $data['partit'] = $this->Partit_model->getAllPart_model();
    $data['user'] = $this->User_model->getUserBySession();

    $this->load->view('templates/head', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('assetit/perbaikan', $data);
    $this->load->view('templates/foot');
  }

  public function savePerbaikanPc()
  {
    $data['tittle'] = 'Perbaikan PC';
    $data['datawo'] = $this->Asset_model->getWO_SqlModel();
    $data['asset'] = $this->Asset_model->getAllAsset_model();
    $data['partit'] = $this->Partit_model->getAllPart_model();
    $data['user'] = $this->User_model->getUserBySession();

    $this->form_validation->set_rules('idpc_perbaikan', 'Id', 'required');
    $this->form_validation->set_rules('perubahan', 'Perubahan', 'required');
    $this->form_validation->set_rules('tipe', 'Tipe', 'required');
    $this->form_validation->set_rules('tgl_perbaikan', 'Tanggal Perbaikan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('assetit/perbaikan', $data);
      $this->load->view('templates/foot');
    } else {
      $this->History_model->perbaikanPC_model();
      //$this->Partit_model->updateStokPart_model(); 
      //fungsi ini sudah dikerjakan oleh triger pada database > tb_history
      $this->Partit_model->deletePartStok0_model();
      $this->session->set_flashdata('flash', 'Ditambahkan');
      redirect('assetit');
    }
  }

  public function getPC()
  {
    echo json_encode($this->Asset_model->getAssetByIdpc_model($_POST['id']));
  }

  public function getHistoryById()
  {
    echo json_encode($this->History_model->getHistoryByIdHistory_model($_POST['id']));
  }

  public function detailAplikasi()
  {
    echo json_encode($this->Asset_model->getDetailAplikasi($_POST['id']));
  }
}
