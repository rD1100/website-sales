<?php
class Model_cari extends CI_Model {

	public function carik()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from tb_barang where nama_barang like '%$cari%' ");
		return $data->result();
	}
 
 
}