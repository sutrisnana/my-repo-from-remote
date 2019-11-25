<?php

class Laptop_model extends CI_Model
{
    public function getAllLaptop_model()
    {
        return $this->db->get('asset_laptop')->result_array();
    }

    public function getLaptopById_model($id)
    {
        return $this->db->get_where('asset_laptop', ['id' => $id])->row_array();
    }
}
