<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_model
{

  public function getAllMenu_model()
  {
    return $this->db->get('user_menu')->result_array();
  }

  public function getMenuById_model($id)
  {
    return $this->db->get_where('user_menu', ['id' => $id])->row_array();
  }

  public function getSubmenuById_model($id)
  {
    return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
  }

  public function getAllSubMenu_model()
  {
    $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";

    return $this->db->query($query)->result_array();
  }

  public function insertMenu()
  {
    $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
  }

  public function insertSubMenu()
  {
    $data = [

      'menu_id' => $this->input->post('menu_id'),
      'title' => $this->input->post('title'),
      'url' => $this->input->post('url'),
      'icon' => $this->input->post('icon'),
      'is_active' => $this->input->post('is_active')
    ];

    $this->db->insert('user_sub_menu', $data);
  }

  public function hapusSubMenu_model($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_sub_menu');
  }

  public function hapusMenu_model($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_menu');
  }

  public function ubahMenu_model()
  {
    $data = [
      "id" => $this->input->post('id', true),
      "menu" => $this->input->post('menu', true)
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_menu', $data);
  }

  public function ubahSubmenu_model()
  {
    $data = [
      "id" => $this->input->post('id', true),
      "menu_id" => $this->input->post('menu_id', true),
      "title" => $this->input->post('title', true),
      "url" => $this->input->post('url', true),
      "icon" => $this->input->post('icon', true),
      "is_active" => $this->input->post('is_active', true)
    ];
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_sub_menu', $data);
  }
}
