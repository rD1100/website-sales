<?php

class Model_app extends CI_Model
{
    public function get_data($limit, $start)
    {
        $query = $this->db->get('tb_barang', $limit, $start);
        return $query;
    }

    public function countAll()
    {
        return $this->db->get('tb_barang')->num_rows();
    }
}
