<?php
class Product extends CI_Controller {
 

 
	public function cari() 
	{
		$this->load->view('templates/topbar');
	}
 
	public function hasil()
	{
		$data['cari'] = $this->model_cari->carik();
		$this->load->view('user/hasilcari', $data);
	}
}