<?php


class Menu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Menu_model');
    $this->load->model('User_model');
    $this->load->library('form_validation');
  }


  public function index()
  {
    $data['tittle'] = 'Menu Management';
    $data['user'] = $this->User_model->getUserBySession();
    $data['menu'] = $this->Menu_model->getAllMenu_model();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/foot');
    } else {

      $this->Menu_model->insertMenu();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"role="alert">New Menu Added<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('menu');
    }
  }

  public function submenu()
  {
    $data['tittle'] = 'Submenu Management';
    $data['user'] = $this->User_model->getUserBySession();
    $data['subMenu'] = $this->Menu_model->getAllSubMenu_model();
    $data['menu'] = $this->Menu_model->getAllMenu_model();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/foot');
    } else {

      $this->Menu_model->insertSubMenu();

      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"role="alert">New Menu Added<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('menu/submenu');
    }
  }

  public function hapusSubMenu($id)
  {
    $this->Menu_model->hapusSubMenu_model($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('menu/submenu');
  }

  public function hapusMenu($id)
  {
    $this->Menu_model->hapusMenu_model($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('menu');
  }

  public function ubahMenu()
  {
    $data['tittle'] = 'Menu Management';
    $data['user'] = $this->User_model->getUserBySession();
    $data['menu'] = $this->Menu_model->getAllMenu_model();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/foot');
    } else {

      $this->Menu_model->ubahMenu_model();
      $this->session->set_flashdata('flash', 'Diubah');
      redirect('menu');
    }
  }

  public function ubahSubmenu()
  {
    $data['tittle'] = 'Submenu Management';
    $data['user'] = $this->User_model->getUserBySession();
    $data['subMenu'] = $this->Menu_model->getAllSubMenu_model();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu Id', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/head', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/foot');
    } else {

      $this->Menu_model->ubahSubmenu_model();
      $this->session->set_flashdata('flash', 'Diubah');
      redirect('menu/submenu');
    }
  }

  public function getUbah()
  {
    echo json_encode($this->Menu_model->getMenuById_model($_POST['id']));
  }

  public function getUbahSubmenu()
  {
    echo json_encode($this->Menu_model->getSubmenuById_model($_POST['id']));
  }
}
