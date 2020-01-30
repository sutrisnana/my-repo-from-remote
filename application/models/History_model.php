<?php

class History_model extends CI_model
{

  public function getHistoryById_model($idpc)
  {
    return $this->db->get_where('history_asset', ['idpc' => $idpc])->result_array();
  }

  public function getHistoryByIdHistory_model($id)
  {
    return $this->db->get_where('history_asset', ['id_history' => $id])->row_array();
  }

  public function perbaikanPC_model()
  {
    $data = [
      "idpc" => $this->input->post('idpc_perbaikan', true),
      "user" => $this->input->post('user', true),
      "tgl_perbaikan" => strtotime($this->input->post('tgl_perbaikan', true)),
      "tipe" => $this->input->post('tipe', true),
      "perubahan" => $this->input->post('perubahan', true),
      "note" => $this->input->post('note', true),
      "nomor_wo" => $this->input->post('nomor_wo', true),
      "nomor_bpp" => $this->input->post('bpp', true),
      "nomor_wo" => $this->input->post('nomor_wo', true),
      "part_note" => $this->input->post('partname', true),
      "part_receipt" => strtotime($this->input->post('receiptdate', true)),
      "part_id" => $this->input->post('partid', true),
      "part_id_ax" => $this->input->post('id_ax', true),
      "part_qty" => $this->input->post('partqty', true)
    ];

    $this->db->insert('history_asset', $data);
  }
}
