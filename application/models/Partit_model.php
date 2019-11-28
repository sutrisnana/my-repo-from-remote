<?php

class Partit_model extends CI_model
{

  public function getAllPart_model()
  {
    //return $this->db->get('part_it')->result_array();
    $query = $this->db->get('part_it');
    return $query->result_array();
  }

  public function getPartItById_model($id)
  {
    return $this->db->get_where('part_it', ['part_id' => $id])->row_array();
  }

  private function _uploadImage()
  {
    $config['upload_path'] = './upload/images_part/';
    $config['allowed_types'] = 'jpg|png';
    $config['file_name'] = $this->input->post('part_id', true);
    $config['overwrite'] = true;
    $config['max_size'] = 1024; // 1MB
    // $config['max_width'] = 1024;
    // $config['max_height'] = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
      return $this->upload->data("file_name");
    }

    return "default.jpg";
  }

  public function addNewPart_model()
  {
    $this->dbSql->select('NAMEALIAS');
    $this->dbSql->from('INVENTTABLE');
    $this->dbSql->where('INVENTTABLE.ITEMID', $this->input->post('InvAx', true));
    $row = $this->dbSql->get()->row();

    $data = [
      "id" => $this->input->post('', true),
      "part_id" => $this->input->post('part_id', true),
      "part_name" => $row->NAMEALIAS,
      "part_detail" => $this->input->post('part_detail', true),
      "bpp_number" => $this->input->post('bpp_number', true),
      "part_note" => $this->input->post('part_note', true),
      "part_qty" => $this->input->post('part_qty', true),
      "receipt_date" => strtotime($this->input->post('receipt_date', true)),
      "item_id_ax" => $this->input->post('InvAx', true)
    ];
    $this->db->insert('part_it', $data);
  }

  public function saveImagePart_model()
  {
    $data = [
      "id" => $this->input->post('', true),
      "image" => $this->_uploadImage(),
      "id_part" => $this->input->post('part_id', true)
    ];
    $this->db->insert('image_part', $data);
  }

  /*public function updateStokPart_model()
  {
    $this->db->set('part_qty', 'part_qty-1');
    $this->db->where('part_id', $this->input->post('partid', true));
    $this->db->update('part_it');
  }*/

  public function deletePartStok0_model()
  {
    $this->db->where('part_qty', 0);
    $this->db->delete('part_it');
  }

  //Databae SQL ------------------------------------------------------
  public function getPartAX_SqlModel()
  {
    //$where = "INVENTITEMGROUPITEM.ITEMGROUPID=92 OR INVENTITEMGROUPITEM.ITEMGROUPID=63";
    $this->dbSql->select('*');
    $this->dbSql->from('INVENTTABLE');
    $this->dbSql->join('INVENTITEMGROUPITEM', 'INVENTITEMGROUPITEM.ITEMID = INVENTTABLE.ITEMID');
    $this->dbSql->where('INVENTITEMGROUPITEM.ITEMGROUPID', '92');
    //$this->dbSql->where($where);
    return $this->dbSql->get()->result_array();
  }
}
