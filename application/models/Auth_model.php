<?php

class Auth_model extends CI_model
{

  public function addNewUser_model()
  {
    $data = [
      "user_id" => htmlspecialchars($this->input->post('', true)),
      "name" => htmlspecialchars($this->input->post('name', true)),
      "user_name" => $this->input->post('username1', true),
      "image" => 'default.jpg',
      "password" => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
      "role_id" => 2,
      "is_active" => 1,
      "date_created" => time()
    ];

    $this->db->insert('user', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"role="alert"><strong>Congratulation!</strong> your account has been created. Please Login.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('auth');
  }

  public function _login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['user_name' => $username])->row_array();

    //Jika usernya ada
    if ($user) {
      //Jika usernya aktiv
      if ($user['is_active'] == 1) {
        // cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'username' => $user['user_name'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('assetit');
          } else {
            redirect('assetit');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show"role="alert">Wrong password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show"role="alert">This email has not been activated<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show"role="alert">Username is not registered<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('auth');
    }
  }

  public function logout_model()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"role="alert">You have been logged out!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('auth');
  }
}
