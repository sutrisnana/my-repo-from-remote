<?php

class Asset_model extends CI_model
{

  public function getAllAsset_model()
  {
    //return $this->db->get('asset_pc')->result_array();
    $query = $this->db->get('asset_pc');
    return $query->result_array();
  }

  //Pagination
  public function getAsset_model($limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('user', $keyword);
      $this->db->OR_like('idpc', $keyword);
      $this->db->or_like('Processor', $keyword);
      $this->db->or_like('Dept', $keyword);
      $this->db->or_like('jenis', $keyword);
      $this->db->or_like('Ram', $keyword);
    }
    $this->db->order_by('idpc', 'ASC');
    return $this->db->get('asset_pc', $limit, $start)->result_array();
  }

  public function addNewPC_model()
  {
    $data = [
      "id" => $this->input->post('', true),
      "idpc" => $this->input->post('idpc', true),
      "user" => $this->input->post('user', true),
      "dept" => $this->input->post('dept', true),
      "jenis" => $this->input->post('jenis', true),
      "pcname" => $this->input->post('idpc', true),
      "Processor" => $this->input->post('processor', true),
      "Ram" => $this->input->post('ram', true),
      "Vga" => $this->input->post('vga', true),
      "Hdd" => $this->input->post('hdd', true),
      "Ip" => $this->input->post('ip', true),
      "OS" => $this->input->post('os', true),
      "License" => $this->input->post('license', true),
      "Office" => $this->input->post('office', true),
      "Monitor" => $this->input->post('monitor', true),
      "Antivirus" => $this->input->post('antivirus', true),
      "pcstatus" => $this->input->post('pcstatus', true),
      "Tahun" => $this->input->post('tahun', true),
      "nopengajuan" => $this->input->post('nomor_pengajuan', true)
    ];

    $this->db->insert('asset_pc', $data);
  }

  public function editPC_model()
  {
    $data = [
      "idpc" => $this->input->post('idpc', true),
      "user" => $this->input->post('user', true),
      "dept" => $this->input->post('dept', true),
      "jenis" => $this->input->post('jenis', true),
      "pcname" => $this->input->post('idpc', true),
      "Processor" => $this->input->post('processor', true),
      "Ram" => $this->input->post('ram', true),
      "Vga" => $this->input->post('vga', true),
      "Hdd" => $this->input->post('hdd', true),
      "Ip" => $this->input->post('ip', true),
      "OS" => $this->input->post('os', true),
      "License" => $this->input->post('license', true),
      "Office" => $this->input->post('office', true),
      "Monitor" => $this->input->post('monitor', true),
      "Antivirus" => $this->input->post('antivirus', true),
      "pcstatus" => $this->input->post('pcstatus', true),
      "Tahun" => $this->input->post('tahun', true),
      "nopengajuan" => $this->input->post('nomor_pengajuan', true)
    ];

    $this->db->where('idpc', $this->input->post('idpc'));
    $this->db->update('asset_pc', $data);
  }

  public function hapusDataPc($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('asset_pc');
  }

  public function getAssetById_model($id)
  {
    return $this->db->get_where('asset_pc', ['id' => $id])->row_array();
  }

  public function getAssetByIdpc_model($id)
  {
    return $this->db->get_where('asset_pc', ['idpc' => $id])->row_array();
  }

  public function cariDataAsset()
  {
    $keyword = $this->input->post('keyword', true);
    $this->db->like('user', $keyword);
    $this->db->or_like('Processor', $keyword);
    $this->db->or_like('Dept', $keyword);
    $this->db->or_like('jenis', $keyword);
    $this->db->or_like('Ram', $keyword);
    return $this->db->get('asset_pc')->result_array();
  }

  public function countAllPc()
  {
    return $this->db->get('asset_pc')->num_rows();
  }

  public function getDetailAplikasi($id)
  {
    $this->db->select('*');
    $this->db->from('aplikasi');
    $this->db->join('aplikasi_asset', 'aplikasi_asset.id_aplikasi=aplikasi.id_aplikasi');
    $this->db->where(array('idpc' => $id));
    $query = $this->db->get();
    return $query->result();
  }

  //Databae SQL ------------------------------------------------------

  public function getWO_SqlModel()
  {
    //$wo_kategori = 'HARDWARE || SOFTWARE';
    $this->dbSql->select('*');
    $this->dbSql->from('MSA_WO');
    $this->dbSql->where('MSA_WO.WODEPT', 0);
    $this->dbSql->where('MSA_WO.WOSTATUS', 0);
    //$this->dbSql->where('MSA_WO.KATEGORIMCPC', $wo_kategori);
    return $this->dbSql->get()->result_array();
  }
}
