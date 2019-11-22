<?php

class Laptop_model extends CI_Model
{
    public function getAllLaptop_model()
    {
        return $this->db->get('asset_laptop')->result_array();
    }
}
