<?php

class Infrastruktur_model extends CI_model
{
  public function getAllInfrastruktur($limit, $start2, $keyword2 = null)
  {
    if ($keyword2) {
      $this->db->like('part_name', $keyword2);
      $this->db->or_like('item_id_ax', $keyword2);
      $this->db->or_like('part_detail', $keyword2);
      $this->db->or_like('area_part', $keyword2);
      $this->db->or_like('note', $keyword2);
      $this->db->or_like('bpp', $keyword2);
    }
    return $this->db->get('infrastruktur', $limit, $start2)->result_array();
  }
}
