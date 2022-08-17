<?php

class Model_kategori extends CI_Model
{

    public function data_elektronik()
    {
        return  $this->db->get_where("tb_barang", array('kategori' => 'Taekwondo'));
    }
    public function data_pakaian_anak()
    {
        return  $this->db->get_where("tb_barang", array('kategori' => 'Karate'));
    }
    public function data_pakaian_pria()
    {
        return  $this->db->get_where("tb_barang", array('kategori' => 'Judo'));
    }
    public function data_pakaian_wanita()
    {
        return  $this->db->get_where("tb_barang", array('kategori' => 'Boxing'));
    }
}
