<?php

class User_model extends CI_model
{

  public function getAllUser_model($limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('user_name', $keyword);
      $this->db->or_like('name', $keyword);
    }
    return $this->db->get('user', $limit, $start)->result_array();
  }

  public function cariDataUser()
  {
    $keyword = $this->input->post('keyword', true);
    $this->db->like('user_name', $keyword);
    $this->db->or_like('name', $keyword);
    return $this->db->get('user')->result_array();
  }

  public function getUserByID_model($id)
  {
    return $this->db->get_where('user', ['user_id' => $id])->row_array();
  }

  public function getUserBySession()
  {
    return $this->db->get_where('user', ['user_name' => $this->session->userdata('username')])->row_array();
  }

  public function ubahUser_model()
  {
    $data = [
      "user_id" => $this->input->post('userid', true),
      "name" => $this->input->post('name', true),
      "user_name" => $this->input->post('username', true),
      "image" => $this->input->post('image', true),
      "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
      "role_id" => $this->input->post('roleid', true),
      "is_active" => $this->input->post('isactive', true)

    ];

    var_dump($data);
    $this->db->where('user_id', $this->input->post('userid'));
    $this->db->update('user', $data);
  }
}
